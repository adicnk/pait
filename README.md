# PAIT Development

[![Build Status](https://github.com/codeigniter4/CodeIgniter4/workflows/PHPUnit/badge.svg)](https://github.com/codeigniter4/CodeIgniter4/actions?query=workflow%3A%22PHPUnit%22)
[![Coverage Status](https://coveralls.io/repos/github/codeigniter4/CodeIgniter4/badge.svg?branch=develop)](https://coveralls.io/github/codeigniter4/CodeIgniter4?branch=develop)
[![Downloads](https://poser.pugx.org/codeigniter4/framework/downloads)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub release (latest by date)](https://img.shields.io/github/v/release/codeigniter4/CodeIgniter4)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub stars](https://img.shields.io/github/stars/codeigniter4/CodeIgniter4)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub license](https://img.shields.io/github/license/codeigniter4/CodeIgniter4)](https://github.com/codeigniter4/CodeIgniter4/blob/develop/LICENSE)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/codeigniter4/CodeIgniter4/pulls)
<br>

## Apa itu PAIT (Physical Assesment Based On interactive Technology)

Pembelajaran praktek membutuhkan media pembelajaran yang efektif sehingga menimbulkansemangat dan ketertarikan mahasiswa dengan penggunaan teknologi yang lebih efektif dengan memperkecil faktor resiko.

## Dokumentasi

Informasi lebih lanjut [official site](http://pait.devinc.website).

Dalam repositori ini hanya untuk pengembangan applikasi PAIT dengan menggunakan versi terbaru dari CodeIgniter. Kami berusaha memperbaiki tampilan dan fungsi sehingga lebih user friendly dan berfungsi seperti yang dibutuhkan.

Perkembangan **terakhir** dari applikasi ini dapat dilihat di [progress](http://pait.devinc.website).

## Perubahan yang terjadi pada modul-modul aplikasi

**_Modul Grafik_**

Ada file yang harus dimofikasi antaranya **chart-pie-demo.php** dalam folder **public/admin_assets/js** dan **dashbord.php** dalam folder **view/admin**.

**chart-pie-demo.php** adalah script untuk men-generated grafik yang datanya ada di **Admin.php** dalam folder **Controllers** dengan variable **chartValueData** dan **chartLabelData** yang akan mewakili variable **labelData** dan **datasetData** dalam file **chart-pie-demo.php**.

Jika terjadi penambahan fitur data yg ada di databe field **kategori_soal** maka kolom **jumlah_soal** akan berubah pada variable **chartValueData** dan field **name** merubah variable **chartLabelData**.

Yang perlu diperhatikan jika menambah data, otomatis akan menambah warna dan ini haru dilakukan pada file **chart-pie-demo.php** dan **dashboard**. Pada file **chart-pie-demo.php** dilakukan penambahan data warna dengan huruf hexadesimal untuk variabel **backgroundColor** dan **hoverBackgroundColor**. Pada file **dashboard** dilakukan perubahan pada baris berikut :

            <div class="mt-4 text-center small">
                <?php
                $query = $db->query("SELECT * FROM kategori_soal");
                foreach ($query->getResult('array') as $qclb) :
                ?>
                    <?php switch ($qclb['id']) {
                        case 1: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i><?= $qclb['name'] ?>
                            </span>
                        <?php break;
                        case 2: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i><?= $qclb['name'] ?>
                            </span>
                        <?php break;
                        case 3: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i><?= $qclb['name'] ?>
                            </span>
                        <?php break;
                        case 4: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-warning"></i><?= $qclb['name'] ?>
                            </span>
                        <?php break;
                        case 5: ?>
                            <span class="mr-2">
                                <i class="fas fa-circle text-danger"></i><?= $qclb['name'] ?>
                            </span>
                            <?php break; ?>
                    <?php } ?>
                <?php endforeach ?>
            </div>

Bagian baris **Case** yang harus ditambahkan nomornya sebanyak data di **chartValueData** dan **chartLabelData**.
