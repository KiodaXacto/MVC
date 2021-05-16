<section class="py-0" id="header">
    <div class="bg-holder d-none d-md-block"
        style="background-image:url(<?=$data->list[0]->Photo?>);background-position:right 50%;background-size:45%;">
    </div>
    <div class="container">
        <div class="row align-items-center min-vh-75 min-vh-lg-100">
            <div class="col-md-7 col-lg-6 col-xxl-5 py-6 text-sm-start text-center">
                <h1 class="mt-6 mb-sm-4 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6"><?=$data->list[0]->TitreE?> </h1>
                <p class="mb-4 fs-1"><?=$data->list[0]->ContenuE?></p>
                <?php if(!$s->loginVerification()):?>
                <a class="btn btn-lg btn-success" type="button"  data-bs-toggle="modal" data-bs-target="#formulaireInscription">Participer</a>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<section class="py-5" id="who">
    <div class="bg-holder d-none d-sm-block"
        style="background-image:url(<?=BU?>/public/images/bg.png);z-index:-999;background-position:top left;background-size:225px 755px;margin-top:-17.5rem;">
    </div>
    <div class="container">
      <div class="row">
          <div class="col-lg-9 mx-auto text-center mb-3">
              <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Fiche Téchnique </h5>
          </div>
      </div>
      <div class="row flex-center h-100">
        <div class="col-xl-9">
          <div class="col-md-12 mb-5">
            <div class="card  shadow px-4 px-md-2 px-lg-3 card-span ">
              <div class="row">
                <button type="button" class="btn btn-success">
                      Evenement: <?=$data->list[0]->TitreE?>  
                      
                </button>
                <?php if($s->loginVerification()):?>
                <a type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-pencil-alt"></i>
                  <span foreach-value="id" class="edit-id" style="display: none"></span>
                </a>
                <?php endif;?>
              </div>
              <div class="row">
                <div class="col-md-6 mb-2">
                  <p class="mt-3 mb-md-0 mb-lg-2"><span class="badge bg-info text-light">Date</span>: <?=$data->list[0]->DateE?></p>
                </div>
                <div class="col-md-6 mb-2">
                  <p class="mt-3 mb-md-0 mb-lg-2"><span class="badge bg-info text-light">Type</span>: <?=$data->list[0]->TypeE?> </p>
                </div>
                <div class="col-md-6 mb-2">
                  <button type="button" class="btn btn-info">
                    Prix <span class="badge bg-secondary"><?=$data->list[0]->Prix?> &euro;</span>
                  </button>
                </div>
                <div class="col-md-6 mb-2">
                  <button type="button" class="btn btn-info">
                    Inscrits <span class="badge bg-secondary"><?=$data->list[0]->NbInscritE?></span>
                  </button>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-9 mx-auto text-center mb-3 mt-3"><hr></div>
              </div>
              <div class="row">
                <div class="col-lg-9 mx-auto text-center mb-3">
                  <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Documents:</h5>
                </div>
              </div>
              <?php if($s->loginVerification()):?>
              <form method = "POST" action=<?=Url::link("Evenements/uploadFile")?> enctype="multipart/form-data">
                <input type="hidden" name = "evenement" value = "<?=$data->list[0]->IdEvent  ?>" />
                <div class = "row">
                  <div class="col-md-8 mb-2">
                    <div class="form-group mb-2">
                      <label for="file" class="text-grey">Ajouter un document</label> 
                      <input type="file" class="form-control" id="inputGroupFile04" name="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <div class="form-group mb-2">
                      <label for="upload" class="text-white">.</label> 
                      <input type="submit" value="upload" class="form-control" id="btn btn-info" name="submit">
                    </div>
                  </div>
                </div>
              </form>
              <?php endif?>
              <div class="row">
                <?php foreach($data->files as $k=>$v):?>
                  <div class="col-md-4 mb-2">
                    <a href="<?=Url::link("Base/download/E/{$data->list[0]->IdEvent}/".$v->path)?>" ><?=$v->name?></a>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if($s->loginVerification()):?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form role="form" method="POST" >
                <input type="hidden" name = "IdEvent" value = "<?=$data->list[0]->IdEvent  ?>" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier l'evenement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?=$s->flash()?>
                        <div class="col-sm-9 col-md-12 col-xxl-9">
                            <div class="form-group mb-2">
                                <label for="TitreF" class="text-grey">Titre</label>
                                <input type="text" name="TitreE" id="name" placeholder="Titre" class="form-control" value="<?=$data->list[0]->TitreE?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="DateF" class="text-grey">Date</label>
                                <input type="date" name="DateE" id="date" placeholder="Date" class="form-control" value="<?=$data->list[0]->DateE?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="Prix" class="text-grey">Prix</label>
                                <input type="number" name="Prix" id="prix" placeholder="Prix" class="form-control" value="<?=$data->list[0]->Prix?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="metier" class="text-grey">Type: </label>
                            </div>
                            <div class="form-check form-check-inline"> 
                              <input class="form-check-input" type="radio" name="TypeE" id="discussion" value="Café discussion" <?php if($data->list[0]->TypeE === "Café discussion"):?>checked<?php endif;?>>
                              <label class="form-check-label" for="discussion">Café discussion </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="TypeE" id="Colloque" value="Colloque" <?php if($data->list[0]->TypeE === "Colloque"):?>checked<?php endif;?>>
                              <label class="form-check-label" for="Colloque">Colloque</label>
                            </div>                            
                            <div class="form-group mb-2">
                                <label for="image" class="text-grey">Image</label>
                                <input type="text" name="Photo" id="Image" placeholder="Image" class="form-control" value="<?=$data->list[0]->Photo?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="DescriptionF" class="text-grey">Description</label>
                                <textarea name="ContenuE" id="NbPersonneMax" placeholder="Description" class="form-control mb-5"><?=$data->list[0]->ContenuE?></textarea>
                            </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Save"/>
                    </div>
                </div> 
            </form>
        </div>
    </div>
    <?php else:;?>
    <div class="modal fade" id="formulaireInscription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form role="form" method="POST" action="<?=Url::link("Evenements/register");?>">
                <input type="hidden" name = "IdEvent" value = "<?=$data->list[0]->IdEvent ?>" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Formulaire de Participation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                    </div>
                    <div class="modal-body">
                        <?=$s->flash()?>
                        <div class="col-sm-9 col-md-12 col-xxl-9">
                          
                             <div class="form-group mb-2">
                                <label for="Nom" class="text-grey">Nom</label>
                                <input type="text" name="Nom" id="name" placeholder="Nom" class="form-control" >
                            </div>
                            <div class="form-group mb-2">
                                <label for="Prenom" class="text-grey">Prenom</label>
                                <input type="text" name="Prenom" id="name" placeholder="Prenom" class="form-control" >
                            </div>
                            <div class="form-group mb-2">
                                <label for="Mail" class="text-grey">Email </label>
                                <input type="text" name="Mail" id="name" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="Tel" class="text-grey">Telephone</label>
                                <input type="text" name="Tel" id="name" placeholder="Telephone" class="form-control" >
                            </div>
                            <div class="form-group mb-2">
                                <label for="metier" class="text-grey">Votre metier</label>
                                <input type="text" name="metier" id="name" placeholder="Votre metier" class="form-control" >
                            </div>
                            <div class="form-group mb-2">
                                <label for="niveauEtudes" class="text-grey">Votre niveau d'études</label>
                                <input type="text" name="niveauEtudes" id="name" placeholder="Votre niveau d'études" class="form-control" >
                            </div>
                            <div class="form-check">
                                <label for="metier" class="text-grey">Type de règlement: </label>
                            </div>
                            <div class="form-check form-check-inline"> 
                              <input class="form-check-input" type="radio" name="inscrit_payment" id="virement" value="1">
                              <label class="form-check-label" for="virement">virement </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inscrit_payment" id="cheque" value="2">
                              <label class="form-check-label" for="cheque">cheque</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                              <input class="form-check-input" type="radio" name="inscrit_payment" id="internet" value="3">
                              <label class="form-check-label" for="internet">par internet </label>
                            </div>

                            <div class="form-check">
                                <label for="metier" class="text-grey">Source de règlement: </label>
                            </div>
                            <div class="form-check form-check-inline"> 
                              <input class="form-check-input" type="radio" name="inscrit_source" id="institutionnelle" value="0">
                              <label class="form-check-label" for="institutionnelle">   institutionnelle </label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                              <input class="form-check-input" type="radio" name="inscrit_source" id="individuelle" value="1">
                              <label class="form-check-label" for="individuelle">  individuelle</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Participer !">
                    </div>
                </div> 
            </form>
        </div>
    </div>
    <?php endif;?>
</section>
<?php if($s->loginVerification()):?>
<section class="py-0 mb-6" id="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="accordion" id="accordionExample">
            <h1 class="mt-6 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Participants</h1>
                <?php foreach($data->members as $k=>$v): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$v->Id?>" aria-expanded="true" aria-controls="collapseOne">
                       <?=$v->Nom?> <?=$v->Prenom?> | <?=$v->Mail?>
                    </button>
                    </h2>
                    <div id="collapseOne<?=$v->Id?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="col-md-12 mb-5">
                        <div class="card  shadow px-4 px-md-2 px-lg-3 card-span ">
                          <div class="row mt-3">
                            <div class="col-md-4 mb-3"> 
                              <button type="button" class="btn btn-secondary">
                                <span class="badge bg-secondary">Tél:</span><?=$v->Tel?>
                              </button>
                            </diV>
                            <div class="col-md-4 mb-3"> 
                              <button type="button" class="btn btn-secondary">
                                <span class="badge bg-secondary">Metier</span><?=$v->metier?>
                              </button>
                            </diV>

                            <div class="col-md-4 mb-3"> 
                              <button type="button" class="btn btn-secondary">
                                <span class="badge bg-secondary">Etudes:</span><?=$v->niveauEtudes?>
                              </button>
                            </diV>
                            <div class="col-md-4 mb-3"> 
                              <button type="button" class="btn btn-secondary">
                                <span class="badge bg-secondary">Formation continue:</span><?=$v->isFormationContinue == 0?"Non":"Oui"?>
                              </button>
                            </diV>
                            <div class="col-md-4 mb-3"> 
                              <button type="button" class="btn btn-secondary">
                                <span class="badge bg-secondary">Payment</span><?=$v->payment == 1? "Par Virement": $v->payment == 2? "Par Cheque":"Par Internet"; ?>
                              </button>
                            </diV>
                            <div class="col-md-4 mb-3"> 
                              <button type="button" class="btn btn-secondary">
                                <span class="badge bg-secondary">Source de Payment</span><?=$v->source == 0? "institutionnelle": "individuelle"; ?>
                              </button>
                            </diV>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<?php endif;?>