<section class="py-0" id="contact">
    <div class="bg-holder"
        style="background-image:url(<?=BU?>/public/images/how-it-works.png);background-position:center bottom;background-size:cover;">
    </div>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-9 col-xl-5 text-center pt-8">
                <h5 class="fw-bold fs-3 fs-xxl-5 lh-sm mb-3 text-white">S'authentifier</h5>
                <?=$s->flash()?>
            </div>
            <div class="col-sm-9 col-md-12 col-xxl-9">
            <form role="form" method="POST" >
                <div class="form-group mb-4">
                    <label for="login" class="text-white">Login</label>
                    <input type="login" name="login" id="login" placeholder="Entrez votre Login" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="text-white">Password</label>
                    <input type="password" name="password" id="Password" placeholder="Entrez votre Password" class="form-control">
                </div>
                <div class="form-group mb-4 text-center">
                    <input type="submit" class="btn btn-primary"value="se Connecter"/>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>