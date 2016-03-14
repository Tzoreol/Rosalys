<h3>Tableau de bord</h3>

<div id="dashboard">
    <div class="turnover">
        <h4>Chiffre d'affraire <?php echo $this->lastYearLabel() ?></h4>
            <?php echo $this->lastYear_turnover ?> &euro; (<span style="color: <?php echo $this->percentageColor($this->projectedTurnover_percentage) ?>"><?php echo $this->projectedTurnover_percentage ?>%</span>)
    </div>
    <div class="turnover">
            <h4>Chiffre d'affraire pr&eacute;visionnel</h4>
            <?php echo  $this->projected_turnover ?> &euro; (<span style="color: <?php echo $this->percentageColor($this->lastYearTurnover_percentage) ?>"><?php echo $this->lastYearTurnover_percentage ?>%</span>)
    </div>
    <div class="turnover">
        <h4>Chiffre d'affraire en cours</h4>
        <?php echo  $this->actualMonth_turnover ?> &euro;
    </div>

    <div class="movements first">
        <h4>Encaissements</h4>
        <span class="credit"><?php echo $this->month_cashing ?> &euro;</span>
    </div>
    <div class="movements">
        <h4>D&eacute;caissements</h4>
        <span class="debit"><?php echo $this->month_withdrawal ?> &euro;</span>
    </div>
    <div class="movements">
        <h4>Solde</h4>
        <span class="<?php echo $this->balanceStyle; ?>"><?php echo $this->month_balance ?> &euro;</span>
    </div>

    <div class="lastMovements">
        <h4>30 derniers mouvements</h4>
        <table id="lastMovements">
            <thead>
                <tr>
                    <th width="10%">Date</th>
                    <th width="30%">Description</th>
                    <th width="35%">Type</th>
                    <th width="10%">Sens</th>
                    <th width="10%">Montant</th>
                    <th width="5%">Point&eacute;</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            foreach ($this->entries as $entry) { ?>
                <tr class="<?php echo $this->getStyle($i) ?>">
                    <td><?php echo $entry->getDate() ?></td>
                    <td class="label"><?php echo $entry->getLabel() ?></td>
                    <td class="entryType"><?php echo $entry->getEntryType() ?></td>
                    <td><?php echo $entry->getEntryTypeType() ?></td>
                    <td><?php echo $entry->getAmount() ?></td>
                    <td><?php echo $entry->getPointed() ?></td>
                </tr> <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="outstandings">
        <h4>Encours fournisseurs</h4>
        <table id="outstandings">
            <thead>
            <tr>
                <th width="45%">Fournisseur</th>
                <th width="20%">Date d'achat</th>
                <th width="20%">Date limite</th>
                <th width="10%">Montant</th>
                <th width="5%">Pay&eacute;</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            foreach ($this->outstandings as $outstanding) { ?>
                <tr class="<?php echo $this->getStyle($i) ?>">
                    <td class="label"><?php echo $outstanding->getSupplierName() ?></td>
                    <td><?php echo $outstanding->getPurchaseDate() ?></td>
                    <td><?php echo $outstanding->getLimitDate() ?></td>
                    <td><?php echo $outstanding->getAmount() ?></td>
                    <td><?php echo $outstanding->getIsPaid() ?></td>
                </tr> <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
