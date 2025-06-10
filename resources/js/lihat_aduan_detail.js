import axios from "axios";

    document.addEventListener('DOMContentLoaded', () => {
        const button = document.getElementById('kirimData');

        if(button) {
            button.addEventListener('click', async () => {
                const description = document.getElementById('description').value;

                const data = {
                    Description: description,
                    created_at: new Date(),
                    updated_at: new Date(),
                };

                try {
                    const response = await axios.post('/aduan-detail', data);
                    alert("Komentar anda berhasil di kirim");
                    console.log(response.data);
                } catch (error) {
                    alert("Gagal mengirim komentar");
                    console.log(error);
                }
            })
        }
    })