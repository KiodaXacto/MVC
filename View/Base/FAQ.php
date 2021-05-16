
<section class="py-0" id="header">
    <div class="bg-holder d-none d-md-block"
        style="background-image:url(<?=BU?>/public/images/hero-header.png);background-position:right top;background-size:contain;">
    </div>

    <div class="bg-holder d-md-none"
        style="background-image:url(<?=BU?>/public/images/hero-bg.png);background-position:right top;background-size:contain;">
    </div>

    <div class="container">
        <div class="row align-items-center min-vh-75 min-vh-lg-100">
            <div class="accordion" id="accordionExample">
            <h1 class="mt-6 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">FAQ</h1>
                <?php foreach($data->list as $k=>$v):?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$v->IdQuestion?>" aria-expanded="true" aria-controls="collapseOne">
                        <?=$v->Question?>
                    </button>
                    </h2>
                    <div id="collapseOne<?=$v->IdQuestion?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body bg-white">
                        <?=$v->Réponse?>
                    </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>