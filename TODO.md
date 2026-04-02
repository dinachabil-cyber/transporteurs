# TODO: Fix CTA Button Visibility Across All Pages
Status: [IN PROGRESS]

## Approved Plan Steps:
- [x] 1. Add quote_index route to config/routes.yaml
- [x] 2. Add index() method to QuoteController.php
- [x] 3. Update home/index.html.twig CTA link
- [x] 4. Add global CTA to base.html.twig footer
- [x] 5. Complete translations/messages.ar.yaml
- [x] 6. Enhance templates/front/quote/index.html.twig form
- [x] 7. Test all locales/pages: symfony server:start
- [x] 8. Clear cache: bin/console cache:clear

**All steps completed!** 🎉

CTA "Request a free quote" now visible/functional everywhere:
- Home bottom → /devis
- Footer all pages → /devis
- quote_index renders full form → POST quote_create
