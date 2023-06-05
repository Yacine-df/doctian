<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            min-height: 100vh;
        }
        .container{
            width: 100%;
            margin-top: 2.5rem/* 40px */;
            margin-left: auto;
            margin-right: auto;
        }
        @media (min-width: 640px) {
            .container {
                max-width: 640px;
            }
        }
        @media (min-width: 768px) {
            .container {
                max-width: 768px;
            }
        }
        .container .header{
            width: 20%;
            margin-top: 2.5rem/* 40px */;
            margin-left: auto;
            margin-right: auto;
        }
        .container .header .barcode{
            width: 8rem/* 128px */;
            margin-top: 2.5rem/* 40px */;
            margin-left: auto;
            margin-right: auto;
        }
        .container .header .code{
            display: block;
            width: 100%;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }
        .container h1{
            text-align: center;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }
        .container .note{
            text-align: center;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img class="barcode"  src="https://static.vecteezy.com/system/resources/previews/001/199/360/non_2x/barcode-png.png" alt="" >
            <span class="code">LKnlzeknfLKENZF</span>
        </div>
        <hr class="border border-black mt-4">
        <h1>Electronic prescription</h1>
        <hr class="border border-black mt-4 font-normal">
        <div class="note">
            Please present this document to your pharmacist.To scan the bare code to deliver the medications for you.
        </div>
        <hr class="border border-black mt-4">
        <div>
            <div>
                <h2 style="display: inline-block">Doctor : <span style="font-weight: 400;">Dr saidi sami</span></h2>
            </div>
        </div>
        <div>
            <div>
                <h2 style="display: inline-block; margin-left:10px">Order Number : <span style="font-weight: 400;">1212121</span></h2>
            </div>
        </div>
        <div>
            <div>
                <h2 style="display: inline-block;">Patient : <span style="font-weight: 400;">Salim Salem</span></h2>
            </div>
        </div>
        <div>
            <div>
                <h2 style="display: inline-block; margin-left:10px">insurance Number : <span style="font-weight: 400;">19999</span></h2>
            </div>
        </div>
        <h2 style="text-align: center">Prescription content</h2>
        <div style="margin-bottom: 50px">
            <ul>
                <li>Doliprane 500 . 2 times per dat for 7 days</li>
                <li>Juvamine . 3 times per dat for 30 days</li>
                <li>magnesium . 2 times per dat for 30 days</li>
            </ul>
        </div>
        <hr class="border border-black mt-4">
        <p>Date: 05-06-2023</p>
        <p>fina execution date: 15-06-2023</p>
        <hr class="border border-black mt-4">
        <p><span class="font-weight:500px">Attention:</span>No handriwtten additions to this document will be taken in account</p>
    </div>
</body>
</html>