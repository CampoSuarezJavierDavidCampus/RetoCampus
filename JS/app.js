class Connection {
  constructor(data, method) {
    this.data = data;
    this.method = method;
  }
  async register() {
    let response = await (
      await fetch("api/api.php", {
        method: this.method,
        body: this.data,
      })
    ).text();
    return response;
  }
}
export class App {
  async registerNewCamper() {
    const dataForm = new FormData(document.querySelector("#RegisterCamper"));
    const conn = new Connection(dataForm, "POST");
    let res = await conn.register();
    console.log(res);
  }
}
