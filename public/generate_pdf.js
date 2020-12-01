const puppet = require("puppeteer");
const url = "file://C:\\coding\\PowerMarketApp\\storage\\app\\index.html";

async function timeout(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}
async function run() {
    try {
        const browser = await puppet.launch({
            userDataDir: "C",
            args: ["--disable-web-security", "--no-sandbox"],
        });
        const page = await browser.newPage();
        await page.goto(url);
        await timeout(2000);
        await page.emulateMediaType("screen");
        await page.evaluate(() => { window.scrollBy(0, window.innerHeight); })
        await page.pdf({
            path: "C:\\coding\\PowerMarketApp\\storage\\app\\report.pdf",
            displayHeaderFooter: true,
            printBackground: true,
            width: "400mm",
        });
        await browser.close();
    } catch (error) {
        console.log(error);
    }
}
run();
