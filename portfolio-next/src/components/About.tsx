import RevealSection from "./RevealSection";
import { about } from "@/lib/content";

export default function About() {
  return (
    <section className="bg-black py-28 text-white lg:py-40">
      <div className="mx-auto w-full max-w-2xl px-6 lg:max-w-4xl lg:px-12">
        <RevealSection>
          <p className="mb-6 text-xs font-medium uppercase tracking-[0.4em] text-white/40">
            About
          </p>
          <p className="text-2xl font-medium leading-snug text-white/90 lg:max-w-2xl lg:text-3xl">
            {about.intro}
          </p>
        </RevealSection>

        <RevealSection className="mt-14 lg:mt-20">
          <ul className="grid grid-cols-4 gap-y-6 border-y border-white/10 py-8 lg:py-10">
            {about.stats.map((stat) => (
              <li key={stat.label} className="text-center">
                <p className="text-xl font-semibold text-white lg:text-3xl">
                  {stat.value}
                </p>
                <p className="mt-1 text-[10px] uppercase tracking-widest text-white/40 lg:text-xs">
                  {stat.label}
                </p>
              </li>
            ))}
          </ul>
        </RevealSection>

        <RevealSection className="mt-14 lg:mt-20">
          <p className="mb-5 text-xs font-medium uppercase tracking-[0.4em] text-white/40">
            Expertise
          </p>
          <ul className="flex flex-wrap gap-2">
            {about.skills.map((skill) => (
              <li
                key={skill}
                className="rounded-full border border-white/15 px-4 py-2 text-sm text-white/70"
              >
                {skill}
              </li>
            ))}
          </ul>
        </RevealSection>
      </div>
    </section>
  );
}
