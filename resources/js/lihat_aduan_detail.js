import axios from "axios";

    document.addEventListener('DOMContentLoaded', () => {
        const button = document.getElementById('kirimData');
        if(button) {
            button.addEventListener('click', async (e) => {
                const description = document.getElementById('description').value;
                const complaint_id = e.target.name;
                e.preventDefault();
                const data = {
                    complaint_id: complaint_id,
                    description: description,
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