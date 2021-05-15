<section class="py-0" id="header">
    <div class="bg-holder d-none d-md-block"
        style="background-image:url(<?=$data->list[0]->image?>);background-position:right 50%;background-size:45%;">
    </div>
    <div class="container">
        <div class="row align-items-center min-vh-75 min-vh-lg-100">
            <div class="col-md-7 col-lg-6 col-xxl-5 py-6 text-sm-start text-center">
                <h1 class="mt-6 mb-sm-4 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6"><?=$data->list[0]->TitreF?> </h1>
                <p class="mb-4 fs-1"><?=$data->list[0]->DescriptionF?></p>
                <a class="btn btn-lg btn-success" href="#"role="button">Découvrir mes formations!</a>
            </div>
        </div>
    </div>
</section>
<section class="py-5" id="who">
    <div class="bg-holder d-none d-sm-block"
        style="background-image:url(<?=BU?>/public/images/bg.png);background-position:top left;background-size:225px 755px;margin-top:-17.5rem;">
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
            <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span "><!-- Prix &emsp; Nombre de personne maximum :&emsp; Nombre de place restante : &emsp;-->
              <div class="row">
              <button type="button" class="btn btn-success">
                    Formation: <?=$data->list[0]->TitreF?>  
                    
              </button>
              <a type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal"">
                <i class="fas fa-pencil-alt"></i>
                <span foreach-value="id" class="edit-id" style="display: none"></span>
              </a>
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
            </div>
          </div>
        </div>
      </div>
    </div>
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
                                <textarea name="DescriptionF" id="NbPersonneMax" placeholder="Description" class="form-control mb-5" value="<?=$data->list[0]->DescriptionF?>"></textarea>
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
</section>

<script src="<?=BU?>/public/js/home/home.js"></script>
