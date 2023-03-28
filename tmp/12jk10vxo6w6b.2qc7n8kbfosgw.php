<div class="row list-clients mb-5 px-2">
    <div class="col-12 mx-auto">
        <div class="card">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="max-width: 35px; width: 35px;">#</th>
                                <th style="min-width: 250px; width: 250px; max-width: 251px;">Name</th>
                                <th style="max-width: 316px; width: 315px;">Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>CUI</th>
                                <th>ONRC</th>
                                <th>IBAN</th>
                                <th>Bank</th>
                                <th style="min-width: 140px; max-width: 141px; width: 140px;">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ctr=0; foreach (($clients['subset']?:[]) as $client): $ctr++; ?>
                            
                                <tr>
                                    <input type="hidden" name="client_id" value="<?= ($client->id) ?>">
                                    <td><span><?= ($ctr) ?></span></td>
                                    <td><span class="table-client-name"><?= ($client->name) ?></span></td>
                                    <td><span class="small-text"><?= ($client->address) ?></span></td>
                                    <td>
                                        <?php if ($client->mobile != ''): ?>
                                            <span><?= ($client->mobile) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($client->email != ''): ?>
                                            <span><?= ($client->email) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($client->cui != ''): ?>
                                            <span><?= ($client->cui) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($client->onrc != ''): ?>
                                            <span><?= ($client->onrc) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($client->iban != ''): ?>
                                            <span><?= ($client->iban) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php if ($client->bank != ''): ?>
                                            <span><?= ($client->bank) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="width: 100%; text-align: left">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-outline-primary edit-client-btn" href="client-edit/<?= ($client->id) ?>">edit</a>
                                                <a class="btn btn-outline-danger delete-client-btn"style="margin-left: 3px;">delete</a>
                                            </div>
                                            
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


<div class="modal fade" id="clients-modal" tabindex="-1" aria-labelledby="clients-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="clients-modal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger modal-delete-btn">Delete</button>
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
                    <li class="page-item"><a class="page-link" href="?query=<?= (@$query) ?>&page=<?= ($current_page-1) ?>">Prev</a></li>
                    <li class="page-item"><a class="page-link" href="?query=<?= (@$query) ?>&page=1" style="display: flex; align-items: center; height: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg> <!-- left arrow -->
                    </a></li>
                
                <?php endif; ?>

                <?php if ($current_page > 4): ?>
                <?php $loop_start = $current_page-3; $loop_to = $current_page+3; ?>
                <?php else: ?><?php $loop_start = 1; $loop_to = 7; ?>
                <?php endif; ?>
                <?php for ($i=$loop_start;$i<$clients['count']+1;$i++): ?>
                <?php if ($i <= $loop_to): ?>
                    <?php if ($i == $current_page): ?>
                        
                        <li class="page-item active">
                            <a class="page-link" href="?query=<?= (@$query) ?>&page=<?= ($i) ?>"><?= ($i) ?></a>
                        </li>
                        
                        <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href="?query=<?= (@$query) ?>&page=<?= ($i) ?>"><?= ($i) ?></a>
                        </li>
                        
                    <?php endif; ?>
                <?php endif; ?>
                <?php endfor; ?>
                
                <?php if ($current_page >= $clients['count']): ?>
                
                    <li class="page-item next disabled"><a class="page-link" href="#" style="display: flex; align-items: center; height: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg><!-- right arrow -->
                    </a></li>
                    <li class="page-item next disabled"><a class="page-link" href="#">Next</a></li>
                
                <?php else: ?>
                    <li class="page-item next"><a class="page-link" href="?query=<?= (@$query) ?>&page=<?= ($clients['count']) ?>" style="display: flex; align-items: center; height: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg><!-- right arrow -->
                    </a></li> 
                    <li class="page-item next"><a class="page-link" href="?query=<?= (@$query) ?>&page=<?= ($current_page+1) ?>">Next</a></li>
                
                <?php endif; ?>
               
            </ul>
        </nav>
        <!-- ./pagination -->
    </div>
</div>


