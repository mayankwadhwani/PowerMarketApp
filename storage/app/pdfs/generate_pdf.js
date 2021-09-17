const puppet = require("puppeteer");
const html_path = process.argv[2]
const pdf_name = process.argv[3]

async function run() {
    try {
        const browser = await puppet.launch({
            headless: true,
            // ignoreDefaultArgs: ["--user-data-dir"],
            args: ["--disable-web-security", "--no-sandbox"],
            // pipe: true
        });
        const page = await browser.newPage();
        await page.goto(html_path, {
            waitUntil: "networkidle0"
        });
        await page.emulateMediaType("screen");
        await page.pdf({
            printBackground: true,
            format: "A4",
            scale: 0.49,
            path: `${__dirname}/${pdf_name}`
        });
        await browser.close();
        process.exit();
    } catch (error) {
        console.log(error);
        await browser.close();
        process.exit();
    }
}
run();
