class hashParam {
    salt = "UXVNxM9vbf6H6TZQ";
    constructor () {
        this.hash = new Hashids(this.salt);
    }

    encriptar(parametro)
    {
        return this.hash.encode(parametro);
    }

     desencriptar(parametro)
    {
        return this.hash.decode(parametro);
    }
}