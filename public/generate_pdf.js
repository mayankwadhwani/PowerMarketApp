const puppet = require("puppeteer");
const url = "file://C:\\PowerMarketApp\\storage\\app\\index.html";
async function run() {
    try {
        const browser = await puppet.launch({
            userDataDir: "logs",
            headless:false,
            ignoreDefaultArgs: ['--disable-extensions'],
            args: ["--disable-web-security", "--no-sandbox", 
        '--shm-size=1gb', '--disable-setuid-sandbox', '--single-process', '--no-zygote'],
            pipe: true
        });
        const page = await browser.newPage();
        await page.goto(url);
        await page.emulateMediaType("screen");
        await page.pdf({
            path: "C:\\PowerMarketApp\\storage\\app\\report.pdf",
            displayHeaderFooter: true,
            printBackground: true,
            format: 'A4',
            scale: 0.5
        });
        await browser.close();
        process.exit()
    } catch (error) {
        console.log(error);
        process.exit();
    }
}
run();
