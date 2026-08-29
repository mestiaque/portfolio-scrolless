"use client";

import { useEffect, useState } from "react";

/**
 * True when the viewport matches the mobile breakpoint this experience was
 * built for. Starts as `null` (unknown) so the server-rendered markup never
 * mismatches the client on first paint.
 */
export function useIsMobileViewport(breakpointPx = 768): boolean | null {
  const [isMobile, setIsMobile] = useState<boolean | null>(null);

  useEffect(() => {
    const mql = window.matchMedia(`(max-width: ${breakpointPx - 1}px)`);
    const update = () => setIsMobile(mql.matches);
    update();
    mql.addEventListener("change", update);
    return () => mql.removeEventListener("change", update);
  }, [breakpointPx]);

  return isMobile;
}
