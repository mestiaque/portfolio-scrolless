import { NextRequest, NextResponse } from "next/server";

// Server-side proxy to the Laravel package's message endpoint
// (routes/api.php -> POST /api/messages-store -> PordfolioController::storeMessage).
// Proxying keeps the Laravel base URL out of the client bundle and avoids
// needing CORS configured on the Laravel side for this form.
const LARAVEL_BASE_URL = process.env.LARAVEL_API_BASE_URL;

export async function POST(request: NextRequest) {
  if (!LARAVEL_BASE_URL) {
    return NextResponse.json(
      { message: "Contact backend is not configured yet." },
      { status: 503 }
    );
  }

  const body = await request.json().catch(() => null);
  if (
    !body ||
    typeof body.name !== "string" ||
    typeof body.email !== "string" ||
    typeof body.subject !== "string" ||
    typeof body.message !== "string" ||
    !body.name.trim() ||
    !body.email.trim() ||
    !body.subject.trim() ||
    !body.message.trim()
  ) {
    return NextResponse.json(
      { message: "Name, email, subject and message are all required." },
      { status: 422 }
    );
  }

  const upstream = await fetch(
    `${LARAVEL_BASE_URL.replace(/\/$/, "")}/api/messages-store`,
    {
      method: "POST",
      headers: { "Content-Type": "application/json", Accept: "application/json" },
      body: JSON.stringify({
        name: body.name,
        email: body.email,
        subject: body.subject,
        message: body.message,
        device_info: request.headers.get("user-agent") ?? "",
      }),
    }
  ).catch(() => null);

  if (!upstream) {
    return NextResponse.json(
      { message: "Could not reach the contact backend. Please try again later." },
      { status: 502 }
    );
  }

  const data = await upstream.json().catch(() => ({}));

  if (!upstream.ok) {
    return NextResponse.json(
      { message: data.message ?? "Failed to send your message.", errors: data.errors },
      { status: upstream.status }
    );
  }

  return NextResponse.json(data, { status: 200 });
}
