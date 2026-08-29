export const FRAME_COUNT = 210;

/**
 * Ordered list of hero keyframe URLs, served from /public/frames.
 * To swap in a new sequence: replace the files in public/frames
 * (named frame-001.webp ... frame-NNN.webp) and update FRAME_COUNT.
 */
export function getFrameUrls(count: number = FRAME_COUNT): string[] {
  return Array.from({ length: count }, (_, i) => {
    const n = String(i + 1).padStart(3, "0");
    return `/frames/frame-${n}.webp`;
  });
}
