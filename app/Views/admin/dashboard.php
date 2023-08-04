<?= $this->extend("static/admin/layout") ?>

<?= $this->section("title") ?>Dashboard<?= $this->endsection() ?>

<?= $this->section("content") ?>

<div class="page-header">
    <h1 class="page-title">
        Dashboard
    </h1>
</div>
<div class="row row-cards">
    <div class="col-sm-6 col-lg-6">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-blue mr-3">
                    <i class="fe fe-database"></i>
                </span>
                <div>
                    <h4 class="m-0"><a href="javascript:void(0)"><?= $nbr_struct ?></a></h4>
                    <small class="text-muted">Structures</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-6">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-red mr-3">
                    <i class="fe fe-users"></i>
                </span>
                <div>
                    <h4 class="m-0"><a href="javascript:void(0)"><?= $nbr_act ?></a></h4>
                    <small class="text-muted">Acteurs</small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row row-cards row-deck">

    <div class="col-sm-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Structure par categorie</h4>
            </div>
            <canvas id="chart" width="100" height="100"></canvas>
        </div>
    </div>
    <div class="col-sm-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Passage quotidien</h2>
            </div>
            <div class="card-body o-auto" style="height: 15rem">
                <ul class="list-unstyled list-separated">
                    <?php foreach ($passage_quotidien as $passage) : ?>
                        <li class="list-separated-item">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div>
                                        <a href="javascript:void(0)" class="text-inherit"><?= $passage->email ?></a>
                                    </div>
                                    <small class="d-block item-except text-sm text-muted h-1x"><?= $passage->somme_passages ?> passages</small>
                                </div>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row row-cards row-deck">
    <div class="col-sm-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Passage hebdomadaire</h2>
            </div>
            <div class="card-body o-auto" style="height: 15rem">
                <?php if (!empty($passage_hebdos)) : ?>
                    <ul class="list-unstyled list-separated">
                        <?php foreach ($passage_hebdos as $passage_hebdo) : ?>
                            <li class="list-separated-item">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div>
                                            <a href="javascript:void(0)" class="text-inherit"><?= $passage_hebdo['email'] ?></a>
                                        </div>
                                        <small class="d-block item-except text-sm text-muted h-1x"><?= $passage_hebdo['nombre_utilisateurs'] ?> passage(s) cette semaine</small>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>
                <?php else : ?>
                    <p>Aucun utilisateur n'a été passé cette semaine.</p>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>


<script>
    var data = <?php echo json_encode($struct_cat); ?>;

    var labels = [];
    var values = [];

    data.forEach(function(item) {
        labels.push(item.nom);
        values.push(item.nbr);
    });

    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre',
                data: values,
                backgroundColor: ["red", "green", "blue", "orange", "brown"],
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>
<?= $this->endsection() ?>