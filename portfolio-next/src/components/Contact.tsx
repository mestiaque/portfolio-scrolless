"use client";

import { useState, FormEvent } from "react";
import RevealSection from "./RevealSection";
import { contact } from "@/lib/content";
import { Icon, iconPaths } from "./icons";

type Status = "idle" | "submitting" | "success" | "error";

export default function Contact() {
  const [status, setStatus] = useState<Status>("idle");
  const [errorMessage, setErrorMessage] = useState("");

  const channels = [
    contact.phone && {
      label: "Phone",
      value: contact.phone,
      href: `tel:${contact.phone.replace(/[^\d+]/g, "")}`,
      icon: iconPaths.phone,
    },
    {
      label: "Email",
      value: contact.email,
      href: `mailto:${contact.email}`,
      icon: iconPaths.email,
    },
    contact.address && {
      label: "Address",
      value: contact.address,
      href: undefined,
      icon: iconPaths.address,
    },
    contact.telegram && {
      label: "Telegram",
      value: contact.telegram,
      href: `https://t.me/${contact.telegram.replace(/^@/, "")}`,
      icon: iconPaths.telegram,
    },
    contact.phone && {
      label: "WhatsApp",
      value: "Chat instantly",
      href: `https://wa.me/${contact.phone.replace(/[^\d]/g, "")}`,
      icon: iconPaths.whatsapp,
    },
    ...contact.socials.map((social) => ({
      label: social.label,
      value: social.href.replace(/^https?:\/\//, ""),
      href: social.href,
      icon: social.label === "GitHub" ? iconPaths.github : iconPaths.linkedin,
    })),
  ].filter(Boolean) as {
    label: string;
    value: string;
    href?: string;
    icon: React.ReactNode;
  }[];

  const handleSubmit = async (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    const form = e.currentTarget;
    const data = new FormData(form);

    setStatus("submitting");
    setErrorMessage("");

    try {
      const res = await fetch("/api/contact", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          name: data.get("name"),
          email: data.get("email"),
          subject: data.get("subject"),
          message: data.get("message"),
        }),
      });

      const body = await res.json().catch(() => ({}));

      if (!res.ok) {
        setStatus("error");
        setErrorMessage(body.message ?? "Something went wrong. Please try again.");
        return;
      }

      setStatus("success");
      form.reset();
    } catch {
      setStatus("error");
      setErrorMessage("Network error. Please try again.");
    }
  };

  return (
    <footer className="bg-black px-6 pb-14 pt-28 text-white lg:px-12 lg:pb-20 lg:pt-40">
      <div className="mx-auto w-full max-w-2xl lg:max-w-6xl">
      <RevealSection>
        <p className="mb-6 text-xs font-medium uppercase tracking-[0.4em] text-white/40">
          Contact
        </p>
        <h2 className="text-4xl font-semibold leading-[1.05] tracking-tight lg:text-6xl">
          Let&apos;s build something great.
        </h2>
      </RevealSection>

      <div className="lg:grid lg:grid-cols-2 lg:gap-16">
        {/* Contact Hub - quick channel cards, mirroring contact.blade.php's
            layout. Cards with no real value configured (phone/telegram) are
            omitted rather than showing a placeholder. */}
        <ul className="mt-10 flex flex-col gap-3 lg:mt-14 lg:grid lg:grid-cols-2 lg:content-start lg:gap-3">
          {channels.map((channel) => {
            const Wrapper = channel.href ? "a" : "div";
            return (
              <li key={channel.label}>
                <Wrapper
                  {...(channel.href
                    ? { href: channel.href, target: "_blank", rel: "noopener noreferrer" }
                    : {})}
                  className="flex items-center gap-4 rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 transition-transform duration-200 active:scale-[0.98] lg:hover:border-white/25"
                >
                  <span className="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-white/15 text-white/70">
                    <Icon path={channel.icon} />
                  </span>
                  <span>
                    <p className="text-sm font-medium text-white">
                      {channel.label}
                    </p>
                    <p className="text-xs text-white/50">{channel.value}</p>
                  </span>
                </Wrapper>
              </li>
            );
          })}
        </ul>

        {/* Message form - proxied server-side to the Laravel package's
            /api/messages-store endpoint via src/app/api/contact/route.ts.
            On success the fields/button are replaced with an animated
            checkmark rather than just leaving an empty form behind. */}
        {status === "success" ? (
          <div className="mt-10 flex flex-col items-center gap-4 rounded-2xl border border-emerald-400/20 bg-emerald-400/[0.04] py-12 text-center animate-[fadeIn_0.4s_ease-out]">
            <span className="flex h-14 w-14 items-center justify-center rounded-full border-2 border-emerald-400 text-emerald-400">
              <svg
                viewBox="0 0 24 24"
                width="26"
                height="26"
                fill="none"
                stroke="currentColor"
                strokeWidth="3"
                strokeLinecap="round"
                strokeLinejoin="round"
                aria-hidden="true"
              >
                <path
                  d="M4 12.5 9.5 18 20 6"
                  pathLength={1}
                  strokeDasharray={1}
                  strokeDashoffset={1}
                  className="animate-[drawCheck_0.5s_0.15s_ease-out_forwards]"
                />
              </svg>
            </span>
            <p className="text-sm text-emerald-400">
              Message sent — thanks for reaching out!
            </p>
            <button
              type="button"
              onClick={() => setStatus("idle")}
              className="text-xs uppercase tracking-widest text-white/40 active:text-white/70"
            >
              Send another
            </button>
          </div>
        ) : (
          <form onSubmit={handleSubmit} className="mt-10 flex flex-col gap-4">
            <input
              name="name"
              type="text"
              required
              placeholder="Your name"
              disabled={status === "submitting"}
              className="rounded-xl border border-white/15 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder:text-white/30 outline-none focus:border-white/40 disabled:opacity-50"
            />
            <input
              name="email"
              type="email"
              required
              placeholder="Your email"
              disabled={status === "submitting"}
              className="rounded-xl border border-white/15 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder:text-white/30 outline-none focus:border-white/40 disabled:opacity-50"
            />
            <input
              name="subject"
              type="text"
              required
              placeholder="Subject"
              disabled={status === "submitting"}
              className="rounded-xl border border-white/15 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder:text-white/30 outline-none focus:border-white/40 disabled:opacity-50"
            />
            <textarea
              name="message"
              required
              rows={4}
              placeholder="Your message"
              disabled={status === "submitting"}
              className="resize-none rounded-xl border border-white/15 bg-white/[0.03] px-4 py-3 text-sm text-white placeholder:text-white/30 outline-none focus:border-white/40 disabled:opacity-50"
            />

            <button
              type="submit"
              disabled={status === "submitting"}
              className="mt-2 rounded-xl bg-white py-3 text-sm font-medium text-black active:opacity-70 disabled:opacity-50"
            >
              {status === "submitting" ? "Sending..." : "Send message"}
            </button>

            {status === "error" && (
              <p className="text-sm text-red-400">{errorMessage}</p>
            )}
          </form>
        )}
      </div>

      <p className="mt-14 border-t border-white/10 pt-8 text-xs text-white/30 lg:mt-20">
        © {new Date().getFullYear()} M. Estiaque Ahmed Khan. All rights
        reserved.
      </p>
      </div>
    </footer>
  );
}
