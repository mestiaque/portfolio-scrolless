import RevealSection from "./RevealSection";
import { experience, education } from "@/lib/content";

export default function Experience() {
  return (
    <section className="bg-black py-28 text-white lg:py-40">
      <div className="mx-auto w-full max-w-2xl px-6 lg:max-w-6xl lg:px-12">
        <div className="lg:grid lg:grid-cols-2 lg:gap-16">
          <div>
            <RevealSection>
              <p className="mb-10 text-xs font-medium uppercase tracking-[0.4em] text-white/40">
                Experience
              </p>
            </RevealSection>

            <ol className="relative border-l border-white/15 pl-6">
              {experience.map((item, i) => (
                <RevealSection
                  key={item.role + item.company}
                  as="li"
                  style={{ transitionDelay: `${i * 80}ms` }}
                  className="relative mb-12 last:mb-0"
                >
                  <span className="absolute -left-[29px] top-1 h-2.5 w-2.5 rounded-full bg-white" />
                  <p className="text-xs uppercase tracking-widest text-white/40">
                    {item.period}
                  </p>
                  <h3 className="mt-2 text-lg font-semibold text-white">
                    {item.role}
                  </h3>
                  <p className="text-sm text-white/50">{item.company}</p>
                  <p className="mt-3 text-sm leading-relaxed text-white/70">
                    {item.description}
                  </p>
                </RevealSection>
              ))}
            </ol>
          </div>

          <div className="mt-20 lg:mt-0">
            <RevealSection>
              <p className="mb-10 text-xs font-medium uppercase tracking-[0.4em] text-white/40">
                Education
              </p>
            </RevealSection>

            <ol className="relative border-l border-white/15 pl-6">
              {education.map((item, i) => (
                <RevealSection
                  key={item.degree}
                  as="li"
                  style={{ transitionDelay: `${i * 80}ms` }}
                  className="relative mb-12 last:mb-0"
                >
                  <span className="absolute -left-[29px] top-1 h-2.5 w-2.5 rounded-full bg-white" />
                  <p className="text-xs uppercase tracking-widest text-white/40">
                    {item.period}
                  </p>
                  <h3 className="mt-2 text-lg font-semibold text-white">
                    {item.degree}
                  </h3>
                  <p className="text-sm text-white/50">{item.institution}</p>
                </RevealSection>
              ))}
            </ol>
          </div>
        </div>
      </div>
    </section>
  );
}
