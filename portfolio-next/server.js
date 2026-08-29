// cPanel "Setup Node.js App" (Phusion Passenger) entry point.
//
// Passenger does not run `next start` - it expects a single JS file that
// creates an HTTP server and listens on the port Passenger assigns via
// process.env.PORT. This wraps Next.js's programmatic API for that.
//
// Locally (and on any plain VPS) this is NOT used - `npm run start` /
// `next start` via pm2 is simpler there and is what deploy/mestiaque.es.conf
// proxies to. This file only matters for Passenger-based hosting.
const { createServer } = require("http");
const next = require("next");

const port = process.env.PORT || 3000;
const dev = process.env.NODE_ENV !== "production";
const app = next({ dev });
const handle = app.getRequestHandler();

app.prepare().then(() => {
  createServer((req, res) => handle(req, res)).listen(port, () => {
    console.log(`Next.js portfolio ready on port ${port}`);
  });
});
