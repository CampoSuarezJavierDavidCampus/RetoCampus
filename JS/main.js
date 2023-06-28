import { App } from "./app.js";
const app = new App();
const ShowData = document.querySelector("#ShowData");

document.querySelector("#RegisterCamper").addEventListener("submit", (e) => {
  e.preventDefault();
  app.registerNewCamper();
});
