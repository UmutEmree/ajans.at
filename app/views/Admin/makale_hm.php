<div class="row">
                    <div class="col-md-12">
                        <div class="grid simple " style="padding-top:10px;">
                            
                           <div class="grid-title no-border"> 
                           <h3 class="content-header pull-left"><?php echo $page_label; ?></h3>
                              <div class="col-lg-5 pull-right text-right">
                        
                                 
                                <button id="editable-sample_new" class="btn btn-info tipsi"
                                       onclick="location.href='<?php echo SITE_URL ?>Admin/Makale/Insert'"
                                      title="Yeni Ekleme">
                                     Makale Ekle <i class="fa fa-plus"></i>
                                  </button>
                                   
                            </div>
                            </div>
              
                            <div class="grid-body no-border">
                        <table class="table no-more-tables" id="example">
                              <thead>
                              <tr>
                              <th class="col-md-1">NO</th>
                                   <th>makale_name</th>
<th>makale_title</th>
<th>makale_image</th>
<th>makale_desc</th>
<th>makale_keyw</th>
<th>makale_content</th>

                                  <th>İşlem</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i=1;
							 
							   foreach($content as $content_row){?>
                              <tr class=""
                              id="tr_<?php echo $content_row["makale_id"]; ?>" >
                                  <td>
                                  <?php echo $i; ?>
                                  </td>
                                 

                                 <td><?=$content_row["makale_name"]; ?></td>
<td><?=$content_row["makale_title"]; ?></td>
<td><?=$content_row["makale_image"]; ?></td>
<td><?=$content_row["makale_desc"]; ?></td>
<td><?=$content_row["makale_keyw"]; ?></td>
<td><?=$content_row["makale_content"]; ?></td>

                    
            
            <td>
<a href="<?php echo SITE_URL ?>Admin/Makale/Update/<?php echo $content_row["makale_id"]; ?>" class="btn btn-info btn-xs tipsi" title="" data-original-title="Düzenle"><i class="fa fa-edit"></i></a>

<a href="javascript:void(0);" class="btn btn-danger btn-xs tipsi delete_link" title="" data-original-title="Sil"  data-id="<?php echo $content_row["makale_id"]; ?>"><i class="fa fa-times"></i></a>
                                            </td>
                              </tr>
                              
                             <?php $i++;} // end each for main level?>
                              </tbody>
                          </table>
                     </div>
                        </div>
                    </div>
                </div>