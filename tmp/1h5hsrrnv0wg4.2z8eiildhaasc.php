<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/print.css">
    <title>Factura<?= ($invoice['invoice']['serial']) ?><?= (str_pad($invoice['invoice']['number'], $USER_SETTINGS_INVOICE_NUMBER, "0", STR_PAD_LEFT)) ?></title>
    
</head>
<body>

    <div class="page">
        <?php $invoice_items = 0; ?>
        <div class="invoice-header">
            <div class="wrapper">
                <div class="info left">
                    <span>Furnizor: R-BIZ COMERCE S.R.L.</span>
                    <span>Reg. com.: J21/338/2020</span>
                    <span>CIF: 42921264</span>
                    <span>Adresa: Str. Soseaua Urziceni, Nr. 30, Maia, Jud. Ialomita</span>
                    <span>IBAN: RO50INGB0000999910590762</span>
                    <span>Banca: ING BANK NV</span>
                    <span>Capital social: 200 Lei</span>
                </div>
                <div class="center">
                    <span class="invoice-title">FACTURA</span>
                    <div class="invoice-det">
                        <span>Seria <?= ($invoice['invoice']['serial']) ?> Numarul <?= (str_pad($invoice['invoice']['number'], $USER_SETTINGS_INVOICE_NUMBER, "0", STR_PAD_LEFT)) ?></span>
                        <span>Data (zi/luna/an): <?= (date('d/m/Y', strtotime($invoice['invoice']['date']))) ?></span>
                    </div>
                </div>
                <div class="info right">
                    <div style="padding: 3px 0 0 3px">
                        <div style="display: grid; grid-template-columns: 1fr 4fr;">
                            <span>Client:</span>  
                            <span><?= ($invoice['client']->name) ?></span>
                         </div>
                        <div style="display: grid; grid-template-columns: 1fr 4fr;">
                            <span>Adresa:</span>  
                            <span><?= ($invoice['client']->address) ?></span>
                        </div>
                        <?php if ($invoice['client']->phone != ''): ?>
                            <div style="display: grid; grid-template-columns: 1fr 4fr;">
                                <span>Telefon:</span>   
                                <span><?= ($invoice['client']->phone) ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($invoice['client']->email != ''): ?>
                            <div style="display: grid; grid-template-columns: 1fr 4fr;">
                                <span>Email:</span>   
                                <span><?= ($invoice['client']->email) ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($invoice['client']->cui != ''): ?>
                            <div style="display: grid; grid-template-columns: 1fr 4fr;">
                                <span>CUI:</span>     
                                <span><?= ($invoice['client']->cui) ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($invoice['client']->onrc != ''): ?>
                            <div style="display: grid; grid-template-columns: 1fr 4fr;">
                                <span>ONRC:</span>    
                                <span><?= ($invoice['client']->onrc) ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($invoice['client']->iban != ''): ?>
                            <div style="display: grid; grid-template-columns: 1fr 4fr;">
                                <span>IBAN:</span>    
                                <span><?= ($invoice['client']->iban) ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($invoice['client']->bank != ''): ?>
                            <div style="display: grid; grid-template-columns: 1fr 4fr;">
                                <span>Banca:</span>   
                                <span><?= ($invoice['client']->bank) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>        
        </div>

        <div class="invoice-body">
            <table>
                <thead>
                    <tr>
                        <th style="width: 15mm;">Nr. Crt.</th>
                        <th style="width: 105mm;">Denumirea produselor sau a serviciilor</th>
                        <th style="width: 20mm;">U.M.</th>
                        <th style="width: 20mm;">Cant.</th>
                        <th style="width: 20mm;">Pret unitar <br> -Lei- </th>
                        <th style="width: 20mm;">Valoarea <br> -Lei- </th>
                    </tr>
                </thead>
                <tbody style="overflow: hidden !important;">
                    <tr class="subtitle">
                        <td>0</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5(3x4)</td>
                    </tr>
            
                    <?php $ctr=0; foreach (($invoice['items']?:[]) as $items): $ctr++; ?>
                        <tr class="item">
                            <td class="text-center"><?= ($ctr) ?></td>
                            <td class="text-left" style="padding-left: 3px;"><?= ($items->item_name) ?></td>
                            <td class="text-center"><?= ($items->item_um) ?></td>
                            <td class="text-center"><?= ($items->item_qty) ?></td>
                            <td class="text-right" style="padding-right: 3px;"><?= ($items->item_price) ?></td>
                            <td class="text-right" style="padding-right: 3px;"><?= ($items->item_qty * $items->item_price) ?></td>
                        </tr>
                        <?php $invoice_items = $ctr; ?>
                    <?php endforeach; ?>
                    
                    <?php if ($invoice['invoice']['shipping_price'] != 'none'): ?>
                        
                            <tr class="item">
                                <td class="text-center"><?= (++$invoice_items) ?></td>
                                <td class="text-left" style="padding-left: 3px;">Taxa de transport</td>
                                <td class="text-center">-</td>
                                <td class="text-center">1</td>
                                <td class="text-right" style="padding-right: 3px;"><?= ($invoice['invoice']['shipping_price']) ?></td>
                                <td class="text-right" style="padding-right: 3px;"><?= ($invoice['invoice']['shipping_price']) ?></td>
                            </tr>
                        
                    <?php endif; ?>
            
                    <tr class="empty-space">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
            
                </tbody>
            </table> 
        </div>
        <div class="invoice-footer">
            <div class="content" style="display: grid; grid-template-columns: 30mm 108.35mm 59.65mm; border-bottom: 1.5px solid #000;;">
                <div class="left" style="border-right: 1.5px solid #000; border-left: 1.5px solid #000; padding: 2px 0 0 3px;">
                    Semnatura si stampila furnizor
                </div>
                <div class="center" style="border-right: 1.5px solid #000; padding-bottom: 4px;">
                    <div style="padding: 2px 0 0 3px;">Intocmit de: Roman Leonard-Marian </div>
                    <div style="padding: 2px 0 0 3px;">CNP: - </div>
                    <div style="padding: 2px 0 0 3px;">Numele delegatului: -</div>
                    <div style="padding: 2px 0 0 3px;">B.I/C.I: -</div>
                    <div style="padding: 2px 0 0 3px;">Mijloc transport: -</div>
                    <div style="padding: 2px 0 0 3px;">Expedierea s-a efectuat in prezenta noastra la data de ....................ora.........</div>
                    <div style="padding: 2px 0 0 3px;">Semnaturile:</div>
                </div>
                <div class="right" style="border-right: 1.5px solid #000;">
                    <div style="display: grid; grid-template-columns: 19.75mm 39mm; height: 16mm">
                        <div style="border-right: 1.5px solid #000; display: flex; align-items: center; padding: 0 0 0 3px"><span>Total</span></div>
                        <div style="text-align: right; display: flex; align-items: center; justify-content: flex-end; margin-right: 3px;"><span><?= ($invoice['invoice']['price_total']) ?></span></div>
                    </div>
                    <div style="border-top: 1.5px solid #000;">
                        <div style="padding: 2px 0 0 3px;">Semnatura de primire:</div>
                    </div>
                </div>
            </div>
        </div>
        <span style="font-size: 13px;">Conform art. 319 alin. (29) din Legea nr. 227/2015 privind Codul Fiscal, factura este valabila fara semnatura si stampila.</span>
        
    </div>
</body>
</html>