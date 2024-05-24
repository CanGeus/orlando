<?php
if (!empty($_GET)) {
    if (isset($_GET['park1']) && isset($_GET['park2'])) {
        // Sanitasi input
        $park1 = htmlspecialchars($_GET['park1']);
        $park2 = htmlspecialchars($_GET['park2']);

        // Membaca data dari file JSON
        $data = json_decode(file_get_contents('data.json'), true);

        // Memastikan $data adalah array sebelum mencoba menambah/mengubah isinya
        if (!is_array($data)) {
            $data = [];
        }

        // Memperbarui data
        $data['park1'] = $park1;
        $data['park2'] = $park2;

        // Menyimpan kembali ke file JSON
        file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
    } else {
        echo "Parameter 'park1' dan 'park2' diperlukan.";
    }
}
