"use client";

import { useIsMobileViewport } from "@/hooks/useIsMobileViewport";
import Hero from "@/components/Hero";
import DesktopHero from "@/components/DesktopHero";
import About from "@/components/About";
import Work from "@/components/Work";
import Experience from "@/components/Experience";
import Contact from "@/components/Contact";

export default function Home() {
  const isMobile = useIsMobileViewport();

  // Avoid a flash of the wrong hero: render nothing meaningful until we
  // know the viewport, but keep the shell so hydration stays in sync.
  if (isMobile === null) {
    return <div className="h-svh w-full bg-black" />;
  }

  return (
    <main className="w-full bg-black">
      {isMobile ? <Hero /> : <DesktopHero />}
      <About />
      <Work />
      <Experience />
      <Contact />
    </main>
  );
}
