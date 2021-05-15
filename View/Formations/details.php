<section class="py-0" id="header">
    <div class="bg-holder d-none d-md-block"
        style="background-image:url(<?=$data->list[0]->image?>);background-position:right 50%;background-size:45%;">
    </div>
    <div class="container">
        <div class="row align-items-center min-vh-75 min-vh-lg-100">
            <div class="col-md-7 col-lg-6 col-xxl-5 py-6 text-sm-start text-center">
                <h1 class="mt-6 mb-sm-4 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6"><?=$data->list[0]->TitreF?> </h1>
                <p class="mb-4 fs-1"><?=$data->list[0]->DescriptionF?></p>
                <?php if(!$s->loginVerification()):?>
                <a class="btn btn-lg btn-success" type="button"  data-bs-toggle="modal" data-bs-target="#formulaireInscription">S'inscrire</a>
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
                      Formation: <?=$data->list[0]->TitreF?>  
                      
                </button>
                <?php if($s->loginVerification()):?>
                <a type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-pencil-alt"></i>
                  <span foreach-value="id" class="edit-id" style="display: none"></span>
                </a>
                <?php endif;?>
              </div>
              <div class="row">
                <div class="col-md-4 mb-2">
                  <p class="mt-3 mb-md-0 mb-lg-2"><span class="badge bg-info text-light">Date</span>: <?=$data->list[0]->DateF?></p>
                </div>
                <div class="col-md-4 mb-2">
                  <p class="mt-3 mb-md-0 mb-lg-2"><span class="badge bg-info text-light">Durée</span>: <?=intval($data->list[0]->Duree / 24)?> jours <?=$data->list[0]->Duree % 24?> heurs</p>
                </div>
                <div class="col-md-4 mb-2"></div>
                <div class="col-md-4 mb-2">
                  <button type="button" class="btn btn-info">
                    Places <span class="badge bg-secondary"><?=$data->list[0]->Prix?> &euro;</span>
                  </button>
                </div>
                <div class="col-md-4 mb-2">
                  <button type="button" class="btn btn-info">
                    Places <span class="badge bg-secondary"><?=$data->list[0]->NbPersonneMax?></span>
                  </button>
                </div>
                <div class="col-md-4 mb-2">
                  <button type="button" class="btn btn-info">
                    Places restantes <span class="badge bg-secondary">4</span>
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
              <form method = "POST" action=<?=Url::link("Formations/uploadFile")?> enctype="multipart/form-data">
                <input type="hidden" name = "formation" value = "<?=$data->list[0]->IdFormation ?>" />
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
                    <a href="<?=Url::link("Base/download/F/{$data->list[0]->IdFormation}/".$v->path)?>" ><?=$v->name?></a>
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
                <input type="hidden" name = "IdFormation" value = "<?=$data->list[0]->IdFormation ?>" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier la Formation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?=$s->flash()?>
                        <div class="col-sm-9 col-md-12 col-xxl-9">
                            <div class="form-group mb-2">
                                <label for="TitreF" class="text-grey">Titre</label>
                                <input type="text" name="TitreF" id="name" placeholder="Titre" class="form-control" value="<?=$data->list[0]->TitreF?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="DateF" class="text-grey">Date</label>
                                <input type="date" name="DateF" id="date" placeholder="Date" class="form-control" value="<?=$data->list[0]->DateF?>">
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                <label for="jours" class="text-grey">Durée</label>
                                <input type="number" name ="jours" id="jours" placeholder="Jours" class="form-control" value="<?=intval($data->list[0]->Duree/24)?>">
                                </div>
                                <div class="col">
                                <label for="heurs" class="text-white">. </label>
                                <input type="number" name="heurs" id="heurs" placeholder="Heurs" class="form-control" value="<?=$data->list[0]->Duree%24?>">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="Prix" class="text-grey">Prix</label>
                                <input type="number" name="Prix" id="prix" placeholder="Prix" class="form-control" value="<?=$data->list[0]->Prix?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="NbPersonneMax" class="text-grey">Places</label>
                                <input type="number" name="NbPersonneMax" id="Places" placeholder="Places" class="form-control" value="<?=$data->list[0]->NbPersonneMax?>">
                            </div>                            
                            <div class="form-group mb-2">
                                <label for="image" class="text-grey">Image</label>
                                <input type="text" name="image" id="Image" placeholder="Image" class="form-control" value="<?=$data->list[0]->image?>">
                            </div>
                            <div class="form-group mb-2">
                                <label for="DescriptionF" class="text-grey">Description</label>
                                <textarea name="DescriptionF" id="NbPersonneMax" placeholder="Description" class="form-control mb-5"><?=$data->list[0]->DescriptionF?></textarea>
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
            <form role="form" method="POST" action="<?=Url::link("Formations/register");?>">
                <input type="hidden" name = "IdFormation" value = "<?=$data->list[0]->IdFormation ?>" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Formulaire d'inscription</h5>
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
                            <div class="form-check ">
                                <label for="metier" class="text-grey">Formation continue :</label>
                            </div>
                            <div class="form-check form-check-inline"> 
                              <input class="form-check-input" type="radio" name="isFormationContinue" id="inlineCheckbox1" value="0">
                              <label class="form-check-label" for="inlineCheckbox1">Oui</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                              <input class="form-check-input" name = "isFormationContinue" type="radio" id="inlineCheckbox2" value="1">
                              <label class="form-check-label" for="inlineCheckbox2">Non</label>
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
                            <div class="form-check">
                                <label for="metier" class="text-grey">Avez-vous déjà suivi une formation sur le thème proposé?</label>
                            </div>
                            <div class="form-check form-check-inline"> 
                              <input class="form-check-input" type="radio" name="inscrit_Q1" id="inscrit_Q1_OUI" value="0">
                              <label class="form-check-label" for="inscrit_Q1_OUI">Oui</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                              <input class="form-check-input" name = "inscrit_Q1" type="radio" id="inscrit_Q1_NON" value="1">
                              <label class="form-check-label" for="inscrit_Q1_NON">Non</label>
                            </div> 
                            <div class="form-group mb-2">
                                <label for="Preinscrit_Q2" class="text-grey">Décrivez vos formations antérieures:</label>
                                <textarea type="text" name="inscrit_Q2" id="inscrit_Q2" placeholder="Décrivez vos formations antérieures" class="form-control" ></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="Preinscrit_Q3" class="text-grey">Qu’attendez-vous concrètement de cette formation ?</label>
                                <textarea type="text" name="inscrit_Q3" id="inscrit_Q3" placeholder="Qu’attendez-vous concrètement de cette formation ?" class="form-control" ></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="Preinscrit_Q4" class="text-grey">Autres précisions ?</label>
                                <textarea type="text" name="inscrit_Q4" id="inscrit_Q4" placeholder="Autres précisions ?" class="form-control" ></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-check"> 
                          <input class="form-check-input" type="checkbox"id="reglement1" value="0" required>
                          <label class="form-check-label" for="reglement1"><a href="<?=Url::link('Public/files/Conditions générales de vente.pdf');?>"  target="_blank" >Conditions générales de vente</a></label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="reglement2" value="1" required>
                          <label class="form-check-label" for="reglement2"><a href="<?=Url::link('Public/files/Offre de formations 2020-2021.pdf');?>"  target="_blank" >Offre de formations 2020-2021</a></label>
                        </div>  
                        <div class="form-check"> 
                          <input class="form-check-input" type="checkbox"id="reglement3" value="0" required>
                          <label class="form-check-label" for="reglement3"><a href="<?=Url::link('Public/files/Procedure de personnalisation de formation.pdf');?>"  target="_blank" >Procedure de personnalisation de formation</a></label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="checkbox" id="reglement4" value="1" required>
                          <label class="form-check-label" for="reglement4"><a href="<?=Url::link('Public/files/Règlement intérieur concernant les formations.pdf');?>"  target="_blank" >Règlement intérieur concernant les formations</a></label>
                        </div>   
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="S'inscrire !">
                    </div>
                </div> 
            </form>
        </div>
    </div>
    <?php endif;?>
</section>
 
