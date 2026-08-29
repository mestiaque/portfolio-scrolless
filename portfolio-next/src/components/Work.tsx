import RevealSection from "./RevealSection";
import { projects } from "@/lib/content";

export default function Work() {
  return (
    <section className="bg-black py-28 text-white lg:py-40">
      <div className="mx-auto w-full max-w-2xl px-6 lg:max-w-6xl lg:px-12">
      <RevealSection>
        <p className="mb-10 text-xs font-medium uppercase tracking-[0.4em] text-white/40 lg:mb-14">
          Selected Work
        </p>
      </RevealSection>

      <div className="flex flex-col gap-6 lg:grid lg:grid-cols-2 lg:gap-8 xl:grid-cols-3">
        {projects.map((project, i) => {
          const link = project.demo ?? project.github;
          const Wrapper = link ? "a" : "div";

          return (
            <RevealSection
              key={project.title}
              style={{ transitionDelay: `${i * 60}ms` }}
            >
              <Wrapper
                {...(link
                  ? { href: link, target: "_blank", rel: "noopener noreferrer" }
                  : {})}
                className="group block h-full rounded-2xl border border-white/10 bg-white/[0.03] p-6 transition-transform duration-300 active:scale-[0.98] lg:hover:-translate-y-1 lg:hover:border-white/25"
              >
                <div className="flex items-start justify-between gap-4">
                  <div>
                    <p className="text-xs uppercase tracking-widest text-white/40">
                      {project.category}
                    </p>
                    <h3 className="mt-1 text-xl font-semibold text-white">
                      {project.title}
                    </h3>
                  </div>
                  {link && (
                    <span className="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/25 text-white transition-transform duration-300 group-active:translate-x-1 group-active:-translate-y-1">
                      ↗
                    </span>
                  )}
                </div>

                <p className="mt-4 text-sm leading-relaxed text-white/60">
                  {project.description}
                </p>

                <ul className="mt-5 flex flex-wrap gap-2">
                  {project.stack.map((tech) => (
                    <li
                      key={tech}
                      className="rounded-full border border-white/10 px-3 py-1 text-xs text-white/50"
                    >
                      {tech}
                    </li>
                  ))}
                </ul>
              </Wrapper>
            </RevealSection>
          );
        })}
      </div>
      </div>
    </section>
  );
}
