<div class="blog">
    <div class="page-heading blog-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Blog</h4>
                        <h2>Artikel Seputar Batik</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php 
            $i = 1;
            $banyak = count($artikel);
            if ($banyak > 0) :
                foreach ($artikel as $art) : 
                    $isi      = $art->isi_artikel;
                    $ar_isi   = explode(' ', $isi);
                    $banyak   = count($ar_isi);
                    if ($banyak > 20) {
                        $isi      = $ar_isi[0];
                        for ($x = 1; $x < 20; $x++) {
                        $isi = $isi . ' ' . $ar_isi[$x];
                        }
                        $isi = $isi . ' ...';
                    }
                    if ($i % 2 != 0) :
        ?>    
            <div class="row main-row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="blog-img">
                        <img src="<?php echo base_url() ?>assets/images/uploaded_image/<?= $art->gambar_artikel ?>" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-title mb-3 pt-3">
                        <h3><?= $art->judul_artikel ?></h3>
                    </div>
                    <div class="blog-date mb-2">
                        <span><?= $art->tanggal_artikel ?></span>
                    </div>
                    <div class="blog-desc mb-2">
                        <p><?= $isi ?></p>
                    </div>
                    <div class="blog-read-more mb-2 pb-2"> 
                    <p><a href="<?= base_url().'blog/baca/'.$art->id_artikel ?>">Read more....</a></p>
                    </div>
                </div>
            </div>
            <?php
                else:
            ?>
            <div class="row main-row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-title mb-3 pt-3">
                        <h3><?= $art->judul_artikel ?></h3>
                    </div>
                    <div class="blog-date mb-2">
                        <span><?= $art->tanggal_artikel ?></span>
                    </div>
                    <div class="blog-desc mb-2">
                        <p><?= $isi ?></p>
                    </div>
                    <div class="blog-read-more mb-2 pb-2"> 
                    <p><a href="<?= base_url().'blog/baca/'.$art->id_artikel ?>">Read more....</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="blog-img">
                        <img src="<?php echo base_url() ?>assets/images/uploaded_image/<?= $art->gambar_artikel ?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        <?php
                    endif; 
                    $i++;
                endforeach;
            else :
        ?>
        <div class="col-md-12 text-center">
        <h1>Artikel Kosong</h1>
        </div>
        <?php endif; ?> 
        
    <div class="row">
        <?php echo $this -> pagination -> create_links(); ?>
    </div>
</div>