
<?php pageHeader($data);?>
<?php searchbar($data);?>
<?php getModal('learningResultModal', $data);?>
<div class="row justify-content-center" id="contentLearningResults">
    <div class="col-10">
        <nav aria-label="Page navigation" id="topPagination">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                </li>
                <?php for($i=1; $i<=$data['pagination']; $i++) { ?>
                <li class="page-item active"><a class="page-link" href="<?= baseUrl();?>/LearningResult/LearningResult/<?=$i-1?>"><?=$i?></a></li>
                <?php } ?>
                <li class="page-item">
                <a class="page-link" href="#">Siguiente</a>
                </li>
            </ul>
        </nav>
        <div class="card-derk">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                <?php foreach($data['content'] as $key=>$value): ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['descripcion']; ?></h5>
                            <div class="card-initial-page">
                                <div>
                                    <?= $value['detalle']; ?>
                                </div>
                                <button type="button" class="btn btn-link" onclick="viewMore(this)" lr="<?= $value['codigo']; ?>"></button>
                            </div>
                            <div class="text-center" id="view-subjects">
                                <a href="<?= baseUrl();?>Subject/Subject/<?= $value['codigo'];?>" class="btn bd-yellow-300">Espacios académicos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <nav aria-label="Page navigation" id="bottomPagination">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                </li>
                <?php for($i=1; $i<=$data['pagination']; $i++) { ?>
                <li class="page-item"><a class="page-link" href="#"><?=$i?></a></li>
                <?php } ?>
                <li class="page-item">
                <a class="page-link" href="#">Siguiente</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php footer($data); ?>