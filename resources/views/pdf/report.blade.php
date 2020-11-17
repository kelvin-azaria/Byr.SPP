<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   
    <title>Laporan pembayaran SPP</title>

</head>
<body>

  <style>
      .page-break{
         page-break-after:always;
       }
      .text-center{
         text-align:center;
       }
      .text-header {
         font-size:1.1rem;
      }
      .size2 {
         font-size:1.4rem;
      }
      .border-bottom {
         border-bottom:1px black solid;
      }
      .border {
         border: 2px block solid;
      }
      .border-top {
         border-top:1px black solid;
      }
      .float-right {
         float:right;
      }
      .mt-4 {
         margin-top:4px;
       }
      .mx-1 {
         margin:1rem 0 1rem 0;
      }
      .mr-1 {
         margin-right:1rem;
      }
      .mt-1 {
         margin-top:1rem;
      }
      .ml-2 {
         margin-left:2rem;
      }
      .ml-min-5 {
         margin-left:-5px;
      }
      .text-uppercase {
         font:uppercase;
      }
      .d1 {
         font-size:2rem;
      }
      .img {
         position:absolute;
      }
      .link {
         font-style:underline;
      }
      .text-desc {
         font-size:14px;
      }
      .text-bold {
         font-style:bold;
      }
      .underline {
         text-decoration:underline;
      }
      
      .table-center {
         margin-left:auto;
         margin-right:auto;
      }
      .mb-1 {
         margin-bottom:1rem;
      }
      .table {
        font-family: 'Times New Roman', Times, serif;
        border-collapse: collapse;
        width: 100%;
      }

      .table td, .table th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      .table tr:nth-child(even){background-color: #f2f2f2;}

      .table tr:hover {background-color: #ddd;}

      .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #294A70;
        color: white;
      }
  </style>
  @php
  setlocale(LC_ALL, 'id_ID.utf8');
  @endphp
  <!-- header -->
  <div class="text-center">
    <img src="{{ public_path('img/west_java_logo.png') }}" class="img" alt="logo.png" width="90">
    <div style="margin-left:6rem;">
      <span class="text-header text-bold text-danger">
        PEMERINTAH DAERAH PROVINSI JAWA BARAT <br> 
        DINAS PENDIDIKAN <br>
        <span class="size2">
          CABANG DINAS PENDIDIKAN WILAYAH IX
        </span> <br> 
        SEKOLAH MENENGAH KEJURUAN NEGERI 1 CIMAHI <br>
      </span>
      <span class="text-desc">
        Jl. Mahar Martanegara No. 48 Utama, Cimahi Selatan <br> Telepon (022) 6629683<br>
        Website 
        <span class="underline">www.smkn1-cmi.sch.id</span>
        - Email 
        <span class="underline">smkn1cimahi@gmail.com</span> <br>
      </span>
    </div>    
  </div>

  <div>
  <!-- /header -->
   
  <hr class="border">
  
  <!-- content -->
  
  <div class="size2 text-center mb-1">LAPORAN PEMBAYARAN SPP</div>
   
  <div class="text-center text-desc">
    <table class="table table-center">
      <thead>
         <tr>
            {{-- <th>Petugas</th> --}}
            <th>Siswa</th>
            <th>Kelas</th>
            <th>SPP Bulan</th>
            <th>Nominal Bayar</th>
            <th>Tanggal Bayar</th>
         </tr>
      </thead>
      <tbody>
         @foreach($payments as $detail)
         <tr>
            {{-- <td>{{ $detail->User->name }}</td> --}}
            <td>{{ $detail->Student->name }}</td>
            <td>{{ $detail->Student->Classroom->name }}</td>
            <td>{{ strftime("%B", mktime(0, 0, 0, $detail->month, 10)) }}</td>
            <td>{{ $detail->amount }}</td>
            <td>{{ $detail->updated_at->format('d M, Y') }}</td>
         
         </tr>
         @endforeach
      </tbody>
    </table>
  </div>
  
  <!-- /content -->
  <br>
  <!-- footer -->
  <div>Pembuat : {{ auth()->user()->name }}</div>
  <!-- /footer -->
</body>
</html>