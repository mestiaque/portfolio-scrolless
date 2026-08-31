<?php
namespace ME\Pordfolio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Support\Str;
use ME\Pordfolio\Models\Message;
use ME\Services\TelegramBotService;

class PordfolioController extends Controller
{

    protected $telegramService;

    public function __construct(TelegramBotService $telegramService)
    {
        $this->telegramService = $telegramService;
    }

    public function index(Request $request)
    {
        $cfg = config('port3folio', []);

        $seo = [
            'title'          => $cfg['seo']['title']          ?? 'M. Estiaque Ahmed Khan | Full Stack Laravel Developer',
            'description'    => $cfg['seo']['description']    ?? 'Experienced full-stack Laravel developer building modern, performant web applications.',
            'keywords'       => $cfg['seo']['keywords']        ?? 'Laravel, PHP, Full Stack Developer, Web Developer, Portfolio',
            'author'         => $cfg['seo']['author']          ?? 'M. Estiaque Ahmed Khan',
            'og_image'       => $cfg['seo']['og_image']        ?? '',
            'site_name'      => $cfg['seo']['site_name']       ?? 'M. Estiaque Ahmed Khan Portfolio',
            'twitter_handle' => $cfg['seo']['twitter_handle']  ?? '@mestiaque',
            'github_url'     => $cfg['seo']['github_url']      ?? 'https://github.com/mestiaque',
            'linkedin_url'   => $cfg['seo']['linkedin_url']    ?? 'https://linkedin.com/in/mestiaque',
            'job_title'      => $cfg['seo']['job_title']       ?? 'Software Engineer',
            'url'            => $request->url(),
        ];

        $portfolio = [
            'name'      => $cfg['portfolio']['name']      ?? 'M. Estiaque Ahmed Khan',
            'job_title' => $cfg['portfolio']['job_title'] ?? 'Software Engineer',
            'tagline'   => $cfg['portfolio']['tagline']   ?? 'Building scalable ERP & web systems with Laravel and PHP.',
            'photo'     => $cfg['portfolio']['photo']     ?? '',
            'cv_url'    => $cfg['portfolio']['cv_url']    ?? '',
            'bio'       => $cfg['portfolio']['bio']       ?? "I'm a dedicated Software Engineer and Web Developer in Bangladesh with a strong foundation in Laravel and PHP. Over the past 4 years, I've specialized in building robust ERP systems and inventory management software that drive business efficiency, with expertise extending to API integration and server performance optimization for scalable web applications.",

            'email'   => $cfg['portfolio']['email']   ?? 'info@mestiaque.com',
            'phone'   => $cfg['portfolio']['phone']   ?? '+880 1796-009656',
            'address' => $cfg['portfolio']['address'] ?? 'Uttara, Dhaka, Bangladesh',
            'telegram' => $cfg['portfolio']['telegram'] ?? '@_mestiaque',

            'stats' => $cfg['portfolio']['stats'] ?? [
                ['value' => '4+',  'label' => 'Years Active'],
                ['value' => '20+', 'label' => 'Projects Shipped'],
                ['value' => '10+', 'label' => 'Teams Collaborated'],
                ['value' => 'BD',  'label' => 'Current Base'],
            ],

            'skills' => $cfg['portfolio']['skills'] ?? [
                'Laravel', 'PHP 8.3', 'Vue.js', 'Alpine.js', 'Livewire',
                'MySQL', 'Redis', 'Docker', 'REST API', 'Tailwind CSS',
                'Bootstrap 5', 'Git', 'AWS', 'CI/CD',
            ],

            'social_links' => $cfg['portfolio']['social_links'] ?? [
                ['label' => 'GitHub',   'icon' => 'github',   'url' => 'https://github.com/mestiaque'],
                ['label' => 'LinkedIn', 'icon' => 'linkedin', 'url' => 'https://linkedin.com/in/mestiaque'],
            ],

            'experience' => $cfg['portfolio']['experience'] ?? [
                [
                    'role'        => 'Software Engineer',
                    'company'     => 'Natore IT',
                    'period'      => '2025 — Present',
                    'description' => 'Frontend optimization and database management for local business clients.',
                ],
                [
                    'role'        => 'Software Developer',
                    'company'     => 'Isotope IT',
                    'period'      => '2023 — 2025',
                    'description' => 'Specialized in PHP/Laravel web applications and custom inventory management modules.',
                ],
                [
                    'role'        => 'Software Engineer',
                    'company'     => 'Barcode Tech Automation Ltd',
                    'period'      => '2022 — 2023',
                    'description' => 'Led development of enterprise automation solutions and ERP systems integration.',
                ],
            ],

            'education' => $cfg['portfolio']['education'] ?? [
                [
                    'degree'      => 'MSc in Computer Science',
                    'institution' => 'Uttara University',
                    'period'      => '2025',
                ],
                [
                    'degree'      => 'BSc in Computer Science and Engineering',
                    'institution' => 'Uttara University',
                    'period'      => '2021',
                ],
            ],

            'projects' => $cfg['portfolio']['projects'] ?? [
                [
                    'title'       => 'Port3folio Package',
                    'category'    => 'Laravel Package',
                    'description' => 'A modular Laravel package for building dynamic, animated portfolio sites with zero config.',
                    'stack'       => ['Laravel 11', 'Blade', 'Bootstrap 5', 'jQuery'],
                    'icon'        => 'box-seam',
                    'image'       => '',
                    'demo'        => '',
                    'github'      => 'https://github.com/mestiaque/port3folio',
                ],
                [
                    'title'       => 'E-Commerce Platform',
                    'category'    => 'Marketplace',
                    'description' => 'High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.',
                    'stack'       => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Stripe'],
                    'icon'        => 'cart4',
                    'image'       => '',
                    'demo'        => '',
                    'github'      => '',
                ],
                [
                    'title'       => 'SaaS Analytics Dashboard',
                    'category'    => 'Analytics',
                    'description' => 'Real-time analytics platform processing millions of events per day with customisable widget boards.',
                    'stack'       => ['Laravel', 'Livewire', 'Alpine.js', 'PostgreSQL', 'Chart.js'],
                    'icon'        => 'graph-up-arrow',
                    'image'       => '',
                    'demo'        => '',
                    'github'      => '',
                ],
            ],
        ];

        $frameCount = count(glob(__DIR__ . '/../../public/frames_all/frame_*.png')) ?: 192;

        return view('pordfolio::nextfolio', compact('seo', 'portfolio', 'frameCount'));
    }

    /**
     * Serves the hero scroll-frame keyframes. frames_all/ (bundled with
     * this package) is the single source of truth - the raw PNGs there
     * (~1MB each) are resized + re-encoded to WebP on the fly here so the
     * browser gets a small payload, without ever writing a converted copy
     * back to disk. Far-future Cache-Control means each frame is only
     * ever converted once per visitor.
     */
    public function frame(string $filename)
    {
        if (!preg_match('/^frame-(\d{3})\.webp$/', $filename, $m)) {
            abort(404);
        }

        $index = ((int) $m[1]) - 1;
        $sourcePath = __DIR__ . '/../../public/frames_all/' . sprintf('frame_%08d.png', $index);

        if ($index < 0 || !is_file($sourcePath)) {
            abort(404);
        }

        $source = @imagecreatefrompng($sourcePath);
        if (!$source) {
            abort(404);
        }

        $targetWidth = 1600;
        $srcWidth = imagesx($source);
        $srcHeight = imagesy($source);

        if ($srcWidth > $targetWidth) {
            $targetHeight = (int) round($srcHeight * ($targetWidth / $srcWidth));
            $resized = imagescale($source, $targetWidth, $targetHeight);
            imagedestroy($source);
            $source = $resized;
        }

        ob_start();
        imagewebp($source, null, 74);
        $webp = ob_get_clean();
        imagedestroy($source);

        return response($webp, 200, [
            'Content-Type'  => 'image/webp',
            'Cache-Control' => 'public, max-age=31536000, immutable',
        ]);
    }

    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'device_info' => json_encode($request->device_info ?? $request->header('User-Agent')),
        ]);

            $telegramMessage = "📨 New Message Received\n\n"
                . "👤 Name: " . $message->name . "\n"
                . "📧 Email: " . $message->email . "\n"
                . "📝 Subject: " . $message->subject . "\n"
                . "💬 Message:\n" . $message->message;

            $this->telegramService->sendMessage($telegramMessage);

        return response()->json(['message' => 'Message sent successfully!']);
    }

    public function sitemap(Request $request)
    {
        $excludedPrefixes = ['admin', 'api', 'login', 'logout', 'register', 'password', 'checkout', 'cart'];

        $urls = [];

        foreach (RouteFacade::getRoutes() as $route) {
            $methods = $route->methods();

            if (!in_array('GET', $methods, true)) {
                continue;
            }

            $uri = trim($route->uri(), '/');

            if ($uri === '' || $uri === '/') {
                $path = '';
            } else {
                $path = $uri;
            }

            if (Str::contains($path, ['{', '}'])) {
                continue;
            }

            $firstSegment = Str::before($path, '/');
            if ($firstSegment !== '' && in_array($firstSegment, $excludedPrefixes, true)) {
                continue;
            }

            $middleware = $route->gatherMiddleware();
            if (in_array('auth', $middleware, true)) {
                continue;
            }

            $loc = $path === '' ? url('/') : url('/' . $path);
            $urls[$loc] = [
                'loc' => $loc,
                'lastmod' => now()->toDateString(),
                'changefreq' => $path === '' ? 'daily' : 'weekly',
                'priority' => $path === '' ? '1.0' : '0.8',
            ];
        }

        if (!isset($urls[url('/')])) {
            $urls[url('/')] = [
                'loc' => url('/'),
                'lastmod' => now()->toDateString(),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ];
        }

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

        foreach ($urls as $entry) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($entry['loc'], ENT_XML1, 'UTF-8') . "</loc>\n";
            $xml .= "    <lastmod>" . $entry['lastmod'] . "</lastmod>\n";
            $xml .= "    <changefreq>" . $entry['changefreq'] . "</changefreq>\n";
            $xml .= "    <priority>" . $entry['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= "</urlset>";

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(Request $request)
    {
        $lines = [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin',
            'Disallow: /login',
            'Disallow: /logout',
            'Disallow: /register',
            'Disallow: /password',
            'Disallow: /checkout',
            'Disallow: /cart',
            'Disallow: /api/',
            '',
            'Sitemap: ' . url('/sitemap.xml'),
        ];

        return response(implode("\n", $lines) . "\n", 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
