<!DOCTYPE html>
<html>
<head>
  <title>Surat Permohonan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: white;
    }
    .line-height-15 {
    line-height: 1.5;
  }

  .line-height-12 {
    line-height: 1.2;
  }
    .page {
      width: 21cm;
      height: 29.7cm;
      page-break-after: always;
      margin: 1cm auto;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
    }
    .header {
      text-align: left;
      margin-left: 2cm;
      margin-bottom: 20px;
    }
 
   .content {
      margin-left: 2cm;
      margin-right: 2cm;
      margin-bottom: 2cm;
    }
    .content p {

      line-height: 1.5;
      margin: 0;
    }
    .signatures {
      margin-top: 10px;
    }
    .button-container {
      text-align: center;
      margin-top: 20px;
    }
    button {
      padding: 10px 20px;
      margin: 5px;
      cursor: pointer;
    }
    select {
      padding: 5px;
    }
  </style>
</head>
<body>
  <div class="page line-height-12">
    <div class="header">
      <h1>INI KOP SURAT</h1>
    </div>
    <div class="header-content">
        <p>No. : 026.KOPRI-PKC-XXIV.V-04.03.23.D-1.05.2023</p>
      <p>Lamp. : 2</p>
      <p>Hal. : PERMOHONAN NARASUMBER</p>
      <p>Kepada Yth.</p>
      <p><b>VSahabat Harry Nugroho (Chief Research Officer ARC)</b></p>
      <p>Di - Tempat</p>
    </div>
    <div class="content">
      <p><i>Assalamu’alaikum Warahmatullah Wabarakatuh</i></p>
      <p style="text-align:justify;">Salam silaturrahim teriring do’a kami sampaikan semoga Sahabat senantiasa dalam lindungan-Nya, serta dimudahkan dalam menjalankan aktivitas keseharian. Aamiin
      Sehubungan dengan pelaksanaan “KOPRI Development Forum (KDF)” oleh KOPRI PKC PMII Jawa Timur bertajuk “Lifelong Learning to Empower Woman” yang akan diikuti oleh seluruh kader PMII Se-Jawa Timur. Adapun kegiatan ini akan dilaksanakan pada:</p>
      <p>Tanggal : Sabtu, 16 September 2023</p>
      <p>Pukul : 11.00 – 13.00 WIB</p>
      <p>Tempat : Front One Hotel, Pemekasan Jawa Timur</p>
      <p style="text-align: justify;">Dengan ini kami bermaksud untuk memohon Sahabat agar hadir dan menjadi Narasumber dengan materi “Penulisan Policy Brief” pada kegiatan tersebut.</p>
      <p>Demikian surat permohonan ini kami buat, atas perhatian, kerjasama dan partisipasi Sahabat, kami ucapkan terima kasih.</p>
      <p><i>Wallahul Muwaffiq Ilaa Aqwamith Thoriq</i></p>
      <p><i>Wassalamu’alaikum Warahmatullah Wabarakatu</i></p>
      <p>Surabaya, 10 Agustus 2023</p>
      <p>Panitia Pelaksana</p>
      <br>
    </div>
    <div class="signatures">
      <div class="row">
        <div class="col-md-6">
          <p class="text-center">_____________________</p>
          <p class="text-center">Nama Lengkap 1</p>
          <p class="text-center">Ketua Pelaksana</p>
        </div>
        <div class="col-md-6">
          <p class="text-center">_____________________</p>
          <p class="text-center">Nama Lengkap 2</p>
          <p class="text-center">Ketua Pelaksana</p>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-12">
          <p class="text-center">_____________________</p>
          <p class="text-center">Nama Lengkap 3</p>
          <p class="text-center">Ketua Pelaksana</p>
        </div>
      </div>
    </div>
  </div>
  <div class="button-container">
    <label for="paper-format">Pilih Format dan Ukuran Kertas:</label>
    <select id="paper-format">
      <option value="a4">A4</option>
      <option value="letter">Letter</option>
    </select>
    <button id="preview">Preview</button>
    <button id="exportPdf">Export to PDF</button>
    <button id="exportWord">Export to Word</button>
    <button id="print">Print</button>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
  <script>
    document.getElementById("preview").addEventListener("click", function () {
      const paperFormat = document.getElementById("paper-format").value;

      const docDefinition = {
        content: [
        { text: document.querySelector(".header").innerText, style: 'header' },
          { text: document.querySelector(".header-content").innerText, style: 'content' },
          { text: document.querySelector(".content").innerText, style: 'content' },
          {
            columns: [
              { text: '_____________________', alignment: 'center' },
              { text: '_____________________', alignment: 'center' },
            ],
          },
          {
            columns: [
              { text: 'Nama Lengkap 1', alignment: 'center' },
              { text: 'Nama Lengkap 2', alignment: 'center' },
            ],
          },
          {
            columns: [
              { text: 'Ketua Pelaksana', alignment: 'center' },
              { text: 'Ketua Pelaksana', alignment: 'center' },
            ],
          },
          {
            text: '_____________________',
            alignment: 'center',
          },
          {
            text: 'Nama Lengkap 3',
            alignment: 'center',
          },
          {
            text: 'Ketua Pelaksana',
            alignment: 'center',
          },
        ],
        styles: {
          header: {
            fontSize: 18,
            bold: true,
            alignment: 'center',
            margin: [0, 0, 0, 20]
          },
          content: {
            fontSize: 12
          }
        },
        pageOrientation: 'portrait', // Portrait orientation
      };

      if (paperFormat === 'letter') {
        docDefinition.pageSize = 'letter';
      } else {
        docDefinition.pageSize = 'A4';
      }

      // Create the PDF and display it in a popup window
      pdfMake.createPdf(docDefinition).open();
    });

    document.getElementById("exportPdf").addEventListener("click", function () {
      const paperFormat = document.getElementById("paper-format").value;

      const docDefinition = {
        content: [
          { text: 'INI KOP SURAT', style: 'header' },
          { text: document.querySelector(".content").innerText, style: 'content' },
          {
            columns: [
              { text: '_____________________', alignment: 'center' },
              { text: '_____________________', alignment: 'center' },
            ],
          },
          {
            columns: [
              { text: 'Nama Lengkap 1', alignment: 'center' },
              { text: 'Nama Lengkap 2', alignment: 'center' },
            ],
          },
          {
            columns: [
              { text: 'Ketua Pelaksana', alignment: 'center' },
              { text: 'Ketua Pelaksana', alignment: 'center' },
            ],
          },
          {
            text: '_____________________',
            alignment: 'center',
          },
          {
            text: 'Nama Lengkap 3',
            alignment: 'center',
          },
          {
            text: 'Ketua Pelaksana',
            alignment: 'center',
          },
        ],
        styles: {
          header: {
            fontSize: 18,
            bold: true,
            alignment: 'center',
            margin: [0, 0, 0, 20]
          },
          content: {
            fontSize: 12
          }
        },
        pageOrientation: 'portrait', // Portrait orientation
      };

      if (paperFormat === 'letter') {
        docDefinition.pageSize = 'letter';
      } else {
        docDefinition.pageSize = 'A4';
      }

      pdfMake.createPdf(docDefinition).download("surat_permohonan.pdf");
    });



    document.getElementById("exportWord").addEventListener("click", function () {
      const content = document.body.innerHTML;
      const blob = new Blob([content], { type: "application/msword" });
      const url = URL.createObjectURL(blob);
      const a = document.createElement("a");
      a.href = url;
      a.download = "surat_permohonan.doc";
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      URL.revokeObjectURL(url);
    });

    document.getElementById("print").addEventListener("click", function () {
      window.print();
    });
  </script>
</body>
</html>
