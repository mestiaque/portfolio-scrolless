<?php
namespace ME\Pordfolio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route as RouteFacade;
use Illuminate\Support\Str;
use ME\Portfolio\Models\Message;
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
            'title'          => $cfg['seo']['title']          ?? 'M. Estiaque Ahmed Khan | Software Engineer & Laravel Developer',
            'description'    => $cfg['seo']['description']    ?? 'Experienced full-stack Laravel developer building modern, performant web applications.',
            'keywords'       => $cfg['seo']['keywords']        ?? 'Laravel, PHP, Full Stack Developer, Web Developer, Portfolio',
            'author'         => $cfg['seo']['author']          ?? 'M. Estiaque Ahmed Khan',
            'og_image'       => $cfg['seo']['og_image']        ?? '',
            'site_name'      => $cfg['seo']['site_name']       ?? 'M. Estiaque Ahmed Khan Portfolio',
            'twitter_handle' => $cfg['seo']['twitter_handle']  ?? '@mestiaque',
            'github_url'     => $cfg['seo']['github_url']      ?? 'https://github.com/mestiaque',
            'linkedin_url'   => $cfg['seo']['linkedin_url']    ?? 'https://linkedin.com/in/mestiaque',
            'job_title'      => $cfg['seo']['job_title']       ?? 'Full Stack Laravel Developer',
            'url'            => $request->url(),
        ];

        $portfolio = [
            'name'      => $cfg['portfolio']['name']      ?? 'M. Estiaque Ahmed Khan',
            'job_title' => $cfg['portfolio']['job_title'] ?? 'Full Stack Laravel Developer',
            'photo'     => $cfg['portfolio']['photo']     ?? '',
            'cv_url'    => $cfg['portfolio']['cv_url']    ?? '',
            'bio'       => $cfg['portfolio']['bio']       ?? 'I\'m a <strong>full-stack developer</strong> with deep expertise in <strong>Laravel</strong>, Vue.js, and modern DevOps practices. I focus on writing clean, testable code that scales, and I care deeply about developer experience and product quality.',

            'stats' => $cfg['portfolio']['stats'] ?? [
                ['value' => '5+',  'label' => 'Years Exp.'],
                ['value' => '40+', 'label' => 'Projects'],
                ['value' => '20+', 'label' => 'Clients'],
                ['value' => '99%', 'label' => 'Satisfaction'],
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

            'projects' => $cfg['portfolio']['projects'] ?? [
                [
                    'title'       => 'Port3folio Package',
                    'description' => 'A modular Laravel package for building dynamic, animated portfolio sites with zero config.',
                    'stack'       => ['Laravel 11', 'Blade', 'Bootstrap 5', 'jQuery'],
                    'icon'        => 'box-seam',
                    'image'       => '',
                    'demo'        => '',
                    'github'      => 'https://github.com/mestiaque/port3folio',
                ],
                [
                    'title'       => 'E-Commerce Platform',
                    'description' => 'High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.',
                    'stack'       => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Stripe'],
                    'icon'        => 'cart4',
                    'image'       => '',
                    'demo'        => '',
                    'github'      => '',
                ],
                [
                    'title'       => 'SaaS Analytics Dashboard',
                    'description' => 'Real-time analytics platform processing millions of events per day with customisable widget boards.',
                    'stack'       => ['Laravel', 'Livewire', 'Alpine.js', 'PostgreSQL', 'Chart.js'],
                    'icon'        => 'graph-up-arrow',
                    'image'       => '',
                    'demo'        => '',
                    'github'      => '',
                ],
            ],
        ];

        return view('pordfolio::index', compact('seo', 'portfolio'));
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

            $telegramMessage = "📨 *New Message Received*\n\n"
                . "👤 *Name:* " . $message->name . "\n"
                . "📧 *Email:* " . $message->email . "\n"
                . "📝 *Subject:* " . $message->subject . "\n\n"
                . "💬 *Message:*\n" . $message->message;

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
