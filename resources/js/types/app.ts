/**
 * Props HandleInertiaRequests::share() sends to every page.
 * Keep in step with that method; page-specific props live in their domain's types file.
 */
export interface SharedPageProps {
    flash: {
        success: string | null;
    };
}
