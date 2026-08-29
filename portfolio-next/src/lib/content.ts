// Single source of truth for the portfolio's real content - mirrors the
// data shape in the Laravel package's src/Config/config.php and
// PordfolioController so this can be kept in sync with the live site.

export const seo = {
  siteUrl: "https://mestiaque.es",
  title: "M. Estiaque Ahmed Khan | Full Stack Laravel Developer",
  description:
    "Experienced full-stack Laravel developer building modern, performant web applications.",
  keywords:
    "Laravel, PHP, Full Stack Developer, Web Developer, Portfolio",
  siteName: "M. Estiaque Ahmed Khan Portfolio",
  twitterHandle: "@mestiaque",
};

export const hero = {
  name: "M. Estiaque Ahmed Khan",
  jobTitle: "Software Engineer",
  tagline: "Building scalable ERP & web systems with Laravel and PHP.",
};

export const about = {
  intro:
    "I'm a dedicated Software Engineer and Web Developer in Bangladesh with a strong foundation in Laravel and PHP. Over the past 4 years, I've specialized in building robust ERP systems and inventory management software that drive business efficiency, with expertise extending to API integration and server performance optimization for scalable web applications.",
  skills: [
    "Laravel",
    "PHP 8.3",
    "Vue.js",
    "Alpine.js",
    "Livewire",
    "MySQL",
    "Redis",
    "Docker",
    "REST API",
    "Tailwind CSS",
    "Bootstrap 5",
    "Git",
    "AWS",
    "CI/CD",
  ],
  stats: [
    { value: "4+", label: "Years Active" },
    { value: "20+", label: "Projects Shipped" },
    { value: "10+", label: "Teams Collaborated" },
    { value: "BD", label: "Current Base" },
  ],
};

export interface ExperienceItem {
  role: string;
  company: string;
  period: string;
  description: string;
}

export const experience: ExperienceItem[] = [
  {
    role: "Software Engineer",
    company: "Natore IT",
    period: "2025 — Present",
    description:
      "Frontend optimization and database management for local business clients.",
  },
  {
    role: "Software Developer",
    company: "Isotope IT",
    period: "2023 — 2025",
    description:
      "Specialized in PHP/Laravel web applications and custom inventory management modules.",
  },
  {
    role: "Software Engineer",
    company: "Barcode Tech Automation Ltd",
    period: "2022 — 2023",
    description:
      "Led development of enterprise automation solutions and ERP systems integration.",
  },
];

export interface EducationItem {
  degree: string;
  institution: string;
  period: string;
}

export const education: EducationItem[] = [
  {
    degree: "MSc in Computer Science",
    institution: "Uttara University",
    period: "2025",
  },
  {
    degree: "BSc in Computer Science and Engineering",
    institution: "Uttara University",
    period: "2021",
  },
];

export interface Project {
  title: string;
  category: string;
  description: string;
  stack: string[];
  github?: string;
  demo?: string;
}

export const projects: Project[] = [
  {
    title: "Port3folio Package",
    category: "Laravel Package",
    description:
      "A modular Laravel package for building dynamic, animated portfolio sites with zero config.",
    stack: ["Laravel 11", "Blade", "Bootstrap 5", "jQuery"],
    github: "https://github.com/mestiaque/port3folio",
  },
  {
    title: "E-Commerce Platform",
    category: "Marketplace",
    description:
      "High-performance multi-vendor marketplace with real-time order tracking and payment gateway integration.",
    stack: ["Laravel", "Vue.js", "MySQL", "Redis", "Stripe"],
  },
  {
    title: "SaaS Analytics Dashboard",
    category: "Analytics",
    description:
      "Real-time analytics platform processing millions of events per day with customisable widget boards.",
    stack: ["Laravel", "Livewire", "Alpine.js", "PostgreSQL", "Chart.js"],
  },
];

export const contact = {
  email: "info@mestiaque.com",
  socials: [
    { label: "GitHub", href: "https://github.com/mestiaque" },
    { label: "LinkedIn", href: "https://linkedin.com/in/mestiaque" },
  ],
  // Contact Hub cards, matching contact.blade.php's layout. A blank entry's
  // card is skipped rather than showing a placeholder.
  phone: "+880 1796-009656",
  address: "Uttara, Dhaka, Bangladesh",
  telegram: "@_mestiaque",
};
