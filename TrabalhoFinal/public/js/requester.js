class requester {
    constructor() {
        this.disid = localStorage.getItem('dispositivo_id');
        this.setid = localStorage.getItem('setor_id');

        this.path = 'http://localhost/api/index.php';
    }

    async getPerguntas() {
        try {
            const res = await fetch(`${this.path}/getPerguntas`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    setid: this.setid,
                    disid: this.disid
                })
            });

            const data = await res.json();
            return data.perguntas || data; // caso a API retorne { perguntas: [...] }
        } catch (err) {
            console.error('erro no getPerguntas: ', err);
        }
    }

    async addAvaliacao(avatexto, respostas) {
        try {
            const res = await fetch(`${this.path}/addAvaliacao`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    setid: this.setid,
                    disid: this.disid,
                    avatexto: avatexto,
                    respostas: respostas
                })
            });

            return await res.json();
        } catch (err) {
            console.error('erro no addAvaliacao: ', err);
        }
    }
}

export { requester };
