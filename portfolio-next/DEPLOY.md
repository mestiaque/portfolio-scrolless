# Deploying this app

Two environments, two different mechanisms - same codebase.

## Local (this machine)

Already set up: `pm2` runs `next start -p 3411` (the production build), and
nginx (`deploy/mestiaque.es.conf`, applied to
`/etc/nginx/sites-available/mestiaque.es.conf`) proxies `mestiaque.es/` to
it while routing `mestiaque.es/api/*` to the Laravel app.

To redeploy after a code change:

```bash
cd portfolio-next
npm run build
pm2 restart portfolio-next
```

## cPanel (production, www.domain.com)

cPanel doesn't run `next start` directly - it runs Node apps through
Phusion Passenger, which expects a single JS entry file listening on a
`PORT` it assigns. `server.js` in this folder is that entry file; it wraps
Next.js's programmatic server API. It's only used on cPanel - locally,
pm2 + `next start` is what actually serves traffic.

### One-time setup in cPanel

1. **cPanel → Setup Node.js App → Create Application**
   - Node.js version: 20.x (match what this project was built with)
   - Application mode: Production
   - Application root: the folder this repo's `portfolio-next/` is deployed
     into (e.g. `portfolio-next`, if you clone the whole repo into
     `~/portfolio-next` or a subfolder of it)
   - Application URL: `www.domain.com` (the domain/subdomain root you want
     this to serve)
   - Application startup file: `server.js`
2. Click **Run NPM Install** (or via the app's "Enter to the virtual
   environment" terminal link: `npm install`)
3. In the same terminal (this activates the app's Node/npm), run:
   ```bash
   npm run build
   ```
4. Add environment variables in the same cPanel screen ("Environment
   variables" section):
   - `LARAVEL_API_BASE_URL` = the base URL where the Laravel app's
     `/api/messages-store` is reachable **from this same server** (see
     the `/api/*` routing note below - if that works, this is just
     `https://www.domain.com`)
5. **Restart** the app from the cPanel screen.

### Redeploying after a `git pull`

```bash
cd ~/portfolio-next   # wherever cPanel's app root is
git pull
npm install            # only if package.json changed
npm run build
```
Then click **Restart** in cPanel's Node.js App screen (or, from the app's
virtual-env terminal: `touch tmp/restart.txt` if your cPanel version
supports that Passenger convention, otherwise use the Restart button).

### Keeping `/api/*` on the Laravel app

cPanel's Node.js Setup writes Passenger directives into a `.htaccess` in
the application URL's document root, which routes **everything** under
that URL to the Node app - this will swallow `/api/*` too unless excluded.

Add a rewrite exception **above** the Passenger block in that `.htaccess`
so `/api/*` still reaches the Laravel app's `public/index.php` (adjust the
path to wherever the Laravel app's `public/` actually lives on this
account):

```apache
RewriteEngine On
RewriteCond %{REQUEST_URI} ^/api/
RewriteRule ^api/(.*)$ /path/to/laravel/public/index.php [L]
```

The exact cPanel-generated `.htaccess` format varies by host/version, so
treat this as a starting point - verify by checking `.htaccess` after
Passenger setup and adjust the rule placement so it's evaluated before the
`PassengerEnabled on` block.

### `.env.local` / environment variables

`.env*` files are gitignored (see `.gitignore`) - `git pull` will **not**
bring your local `.env.local` to the server. Set
`LARAVEL_API_BASE_URL` via cPanel's Node.js App "Environment variables"
UI instead (step 4 above), not a committed file.
