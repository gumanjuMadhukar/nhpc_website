<section id="inner-banner" class="">
    <div class="inner-banner-wrapper service-banner-wrapper">
      <div class="image-wrapper">
        <img src="https://images.unsplash.com/photo-1579684453377-48ec05c6b30a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1968&q=80" alt="">
      </div>
      <div class="image-overlay"></div>
      <div class="crum-page-title">
        <div class="container">
          <div class="d-flex justify-content-between">
            <div class="heading">
              <!-- <h3>Search Professional</h3> -->
              <h3>Coming Soon</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / Services</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- <section id="search-now">
    <div class="search-now-wrapper">
      <div class="container">
        <div class="col-md-12">
          <div class="search-tabs">
             <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-HP" role="tab" aria-controls="pills-home" aria-selected="true">Search Health Professionals</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-Institute" role="tab" aria-controls="pills-Institute" aria-selected="false">Search Institutions</a>
              </li>
            </ul> 
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-HP" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="tab-card"> 
                  <div class="search-area">
                    <?php //echo form_open('', array('id' =>'form-health_professional', 'onsubmit' => 'return false')); ?>
                       <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="">Professional Name</label>
                            <input type="text" class="form-control" placeholder="Type Name" name="professional_name">
                          </div>
                           <div class="col-md-3">
                            <label for="">Registration Number</label>
                            <input type="text" class="form-control" placeholder="Type Number" name="registration_number">
                          </div> 
                          <div class="col-md-4">
                            <div class="select">
                              <label for="">Select Degree</label>
                              <select name="degree" class="custom-select">
                                <?php
                                  //foreach ($degrees as $key => $value) 
                                  {
                                ?>
                                <option value="<?php //echo $value->id; ?>"><?php //echo $value->name; ?></option> 
                                <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                    <?php //echo form_close(); ?>
                          <div class="col-md-2 submit">
                            <label for=""></label>
                            <button class="btn btn-custom w-100" onClick="search_health_professional()">Search Now</button>
                          </div>
                        </div>
                      </div>
                  </div>
                 <div class="search-display" id="show_health_professional">

                  </div> 
                </div>
              </div>
               <div class="tab-pane fade show" id="pills-Institute" role="tabpanel" aria-labelledby="pills-home-tab"> 
                 <div class="tab-card">
                   <div class="search-area">
                    <?php //echo form_open('', array('id' =>'form-institute', 'onsubmit' => 'return false')); ?>
                      <div class="form-group"> 
                        <div class="row"> 
                          <div class="col-md-7">
                            <label for="">Institution Name</label>
                            <input type="text" class="form-control" placeholder="Type Name" name="institution_name">
                          </div> 
                          <div class="col-md-3">
                            <label for="">Registration Number</label>
                            <input type="text" class="form-control" placeholder="Type Number" name="registration_number">
                          </div> 
                    <?php //echo form_close(); ?>
                          <div class="col-md-2 submit">
                            <label for=""></label>
                            <button class="btn btn-custom w-100" onClick="search_institute()">Search Now</button>
                          </div> 
                       </div> 
                    </div> 
                  </div> 
                 <div class="search-display" id="show_institute">
                    
                  </div>
                </div>
               </div> 
             </div> 
          </div>
        </div>
      </div>
    </div>
  </section> -->

<script language="javascript" type="text/javascript">

  function search_health_professional()
  {
    $('#show_health_professional').empty();
    $.ajax({
      url: "<?php   echo site_url('degrees/search_health_professional')?>",
      data: $('#form-health_professional').serialize(),
      dataType: 'json',
      success: function(result){
        var html = '';
        if(result.length > 0)
        {
          html += '<h5>';
          html += 'Search Result';
          html += '</h5>';
          html += '<div class="search-list">';
          var i = 1;
          $.each(result,function(k,v)
          {
            html += '<div class="list-group">';
            html +=     '<div class="list-group-item">';
            html +=         '<div class="row">';
            html +=             '<div class="col-sm-2">';
            html +=                 '<div class="id">';
            html +=                     i;
            html +=                 '</div>';
            html +=             '</div>';
            html +=             '<div class="col-sm-5">';
            html +=                 '<div class="name">';
            html +=                 v.full_name;
            html +=                 '</div>';
            html +=             '</div>';
            html +=             '<div class="col-sm-5">';
            html +=                 '<div class="email">';
            html +=                 '<a href="">'
            html +=                 v.email;
            html +=                 '</a>';
            html +=                 '</div>';
            html +=             '</div>';
            html +=         '</div>';
            html +=     '</div>';
            html += '</div>';
            i++;
          });
          html += '</div>';
        }
        else
        {
          html += 'No results found';
        }
        $('#show_health_professional').append(html);
      },
      type: 'POST'
    });
  }

  function search_institute()
  {
    $('#show_institute').empty();
    $.ajax({
      url: "<?php   echo site_url('degrees/search_institute')?>",
      data: $('#form-institute').serialize(),
      dataType: 'json',
      success: function(result){
        var html = '';
        if(result.length > 0)
        {
          html += '<h5>';
          html += 'Search Result';
          html += '</h5>';
          html += '<div class="search-list">';
          var i = 1;
          $.each(result,function(k,v)
          {
            html += '<div class="list-group">';
            html +=     '<div class="list-group-item">';
            html +=         '<div class="row">';
            html +=             '<div class="col-sm-2">';
            html +=                 '<div class="id">';
            html +=                     i;
            html +=                 '</div>';
            html +=             '</div>';
            html +=             '<div class="col-sm-5">';
            html +=                 '<div class="name">';
            html +=                 v.name;
            html +=                 '</div>';
            html +=             '</div>';
            // html +=             '<div class="col-sm-5">';
            // html +=                 '<div class="email">';
            // html +=                 '<a href="">'
            // html +=                 v.email;
            // html +=                 '</a>';
            // html +=                 '</div>';
            // html +=             '</div>';
            html +=         '</div>';
            html +=     '</div>';
            html += '</div>';
            i++;
          });
          html += '</div>';
        }
        else
        {
          html += 'No results found';
        }
        $('#show_institute').append(html);
      },
      type: 'POST'
    });
  }

  </script> 