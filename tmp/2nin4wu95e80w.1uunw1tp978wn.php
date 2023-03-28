<div class="row list-invoices mb-5 px-2">
    <div class="col-12 col-lg-12 mx-auto">
        <div class="card">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="min-width: 100px;">Number</th>
                                <th style="min-width: 150px;">Date</th>
                                <th style="min-width: 320px;">Client</th>
                                <th style="min-width: 230px; max-width: 231px;">Items</th>
                                <th style="min-width: 100px;">Shipping price</th>
                                <th style="min-width: 100px;">Total price</th>
                                <th style="min-width: 280px; max-width: 281px; width: 280px;">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (($invoices['subset']?:[]) as $invoice): ?>
                            <?php $client_JSON = $invoice->client;
                                $decodedText = html_entity_decode($client_JSON);  
                                $client = json_decode($decodedText, true);
                                $items_JSON = $invoice->items;
                                $decodedText = html_entity_decode($items_JSON);  
                                $items = json_decode($decodedText, true); ?>
                                <tr>
                                    <td>
                                        <div style="display:flex;align-items:center;">
                                            <span><?= (str_pad($invoice->number, $USER_SETTINGS_INVOICE_NUMBER, "0", STR_PAD_LEFT)) ?></span>
                                            <span class="small-text" style="margin-left: 5px;"><?= ($invoice->serial) ?></span>
                                        </div>
                                    </td>
                                    <td><?= (date('d/m/Y', strtotime($invoice->date))) ?></td>
                                    <td class="table-details">
                                        <div class="table-details-expanded">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="info">
                                                        <div style="display: grid; grid-template-columns: 1fr 3fr; border-bottom: 0.5px solid #ddd;">
                                                            <span>Name:</span>
                                                            <span style="text-align:right;"><?= ($client['name']) ?></span>
                                                        </div>
                                                        <div style="display: grid; grid-template-columns: 1fr 3fr; border-bottom: 0.5px solid #ddd;">
                                                            <span>Address:</span>
                                                            <span style="text-align:right;"><?= ($client['address']) ?></span>
                                                        </div>
                                                        <?php if ($client['cui'] != ''): ?>
                                                            <div style="display: grid; grid-template-columns: 1fr 3fr; border-bottom: 0.5px solid #ddd;">
                                                                <span>CUI:</span>
                                                                <span style="text-align:right;"><?= ($client['cui']) ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($client['onrc'] != ''): ?>
                                                            <div style="display: grid; grid-template-columns: 1fr 3fr; border-bottom: 0.5px solid #ddd;">
                                                                <span>ONRC:</span>
                                                                <span style="text-align:right;"><?= ($client['onrc']) ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($client['phone'] != ''): ?>
                                                            <div style="display: grid; grid-template-columns: 1fr 3fr; border-bottom: 0.5px solid #ddd;">
                                                                <span>Phone:</span>
                                                                <span style="text-align:right;"><?= ($client['phone']) ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($client['email'] != ''): ?>
                                                            <div style="display: grid; grid-template-columns: 1fr 3fr; border-bottom: 0.5px solid #ddd;">
                                                                <span>Email:</span>
                                                                <span style="text-align:right;"><?= ($client['email']) ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($client['iban'] != ''): ?>
                                                            <div style="display: grid; grid-template-columns: 1fr 3fr; border-bottom: 0.5px solid #ddd;">
                                                                <span>IBAN:</span>
                                                                <span style="text-align:right;"><?= ($client['iban']) ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($client['bank'] != ''): ?>
                                                            <div style="display: grid; grid-template-columns: 1fr 3fr;">
                                                                <span>Bank:</span>
                                                                <span style="text-align:right;"><?= ($client['bank']) ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="btn btn-outline table-details-btn" style="display: block; width: 100%; text-align: left; position: relative;">
                                            <span style="display: block;"><?= ($client['name']) ?></span>
                                            <span class="small-text" style="display: block;"><?= ($client['address']) ?></span>

                                            <span class="expand-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-expand" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8zM7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10z"/>
                                            </svg></span>
                                        </div>
                                    </td>
                                    <td class="table-details">
                                        <div class="table-details-expanded">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="info" style="grid-template-columns: 2fr 1fr 1fr; align-items: center;">
                                                        <?php $ctr=0; foreach (($items?:[]) as $item): $ctr++; ?>
                                                            <?php if($ctr == 1){  
                                                                $first_item_name = $item['item_name'];
                                                                $first_item_price = $item['item_price'];
                                                            } ?>
                                                            <div style="display: grid; grid-template-columns: 3fr 1fr 1fr; border-bottom: 0.5px solid #ddd; align-items: center;">
                                                                <span><?= ($item['item_name']) ?> </span>
                                                                <span class="small-text"> - <?= ($item['item_qty']) ?> - <?= ($item['item_um']) ?></span>
                                                                <span style="text-align:right;"><?= ($item['item_price']) ?></span>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn btn-outline table-details-btn" style="display: block; width: 100%; text-align: left; position: relative;">
                                            <span style="display: block;"><?= ((@$first_item_name) ? $first_item_name : "no item") ?></span>
                                            <span class="small-text" style="display: block;"><?= ((@$first_item_price) ? $first_item_price : "0") ?></span>

                                            <span class="expand-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-expand" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8zM7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10z"/>
                                            </svg></span>
                                        </div>
                                    </td>
                                    <td><span><?= ($invoice->shipping_price) ?></span></td>
                                    <td><span><?= ($invoice->price_total) ?></span></td>
                                    <td>
                                        <input type="hidden" name="invoice_id" value="<?= ($invoice->id) ?>">
                                        <div style="width: 100%; text-align: left">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-outline-primary" href="#">edit</a>
                                                <a class="btn btn-outline-dark" href="#" style="margin-right: 4px; margin-left: 4px;">storno</a>
                                                <a class="btn btn-outline-danger" href="#">cancel</a>
                                            </div>
                                            <a class="btn btn-success print-page-btn" style="margin-left: 15px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>


<div class="row mb-5">
    <div class="col-12" style="display: flex; justify-content: center">
        <!-- pagination -->
        <nav>
            <?php $pagination_from = 0; ?>
            <?php $pagination_to = 10; ?>

            <ul class="pagination">
            
                    <?php if ($current_page <= 1): ?>
                    
                        <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#" style="display: flex; align-items: center; height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg> <!-- left arrow -->
                        </a></li>
                    
                    <?php else: ?>
                        <li class="page-item"><a class="page-link" href="?page=<?= ($current_page-1) ?>">Prev</a></li>
                        <li class="page-item"><a class="page-link" href="?page=1" style="display: flex; align-items: center; height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg> <!-- left arrow -->
                        </a></li>
                    
                    <?php endif; ?>

                    <?php if ($current_page > 4): ?>
                    <?php $loop_start = $current_page-3; $loop_to = $current_page+3; ?>
                    <?php else: ?><?php $loop_start = 1; $loop_to = 7; ?>
                    <?php endif; ?>
                    <?php for ($i=$loop_start;$i<$invoices['count']+1;$i++): ?>
                    <?php if ($i <= $loop_to): ?>
                        <?php if ($i == $current_page): ?>
                            
                            <li class="page-item active">
                                <a class="page-link" href="?page=<?= ($i) ?>"><?= ($i) ?></a>
                            </li>
                            
                            <?php else: ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= ($i) ?>"><?= ($i) ?></a>
                            </li>
                            
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php if ($current_page >= $invoices['count']): ?>
                    
                        <li class="page-item next disabled"><a class="page-link" href="#" style="display: flex; align-items: center; height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg><!-- right arrow -->
                        </a></li>
                        <li class="page-item next disabled"><a class="page-link" href="#">Next</a></li>
                    
                    <?php else: ?>
                        <li class="page-item next"><a class="page-link" href="?page=<?= ($invoices['count']) ?>" style="display: flex; align-items: center; height: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg><!-- right arrow -->
                        </a></li> 
                        <li class="page-item next"><a class="page-link" href="?page=<?= ($current_page+1) ?>">Next</a></li>
                    
                    <?php endif; ?>
               
            </ul>
        </nav>
        <!-- ./pagination -->
    </div>
</div>


