@extends('ddad.layout')
@section('content')

            <div class="st_height_30 st_height_lg_30"></div>
            <div class="st_page_header st_style1">
                <div class="st_page_header_left">
                    <h1 class="st_page_header_title">Overview</h1>
                    <p class="st_page_header_subtitle">Welcome to Dashboard Template.</p>
                </div>
                <div class="st_page_header_right">
                    <div class="st_page_header_btn_group">
                        <!-- <a href="#" class="btn btn-outline-light st_icon_btn"><i class="material-icons">refresh</i></a> -->
                        <a href="#" class="btn btn-outline-light"><i class="material-icons-outlined">calendar_today</i>Today</a>
                        <a href="#" class="btn btn-primary"><i class="material-icons-outlined">description</i>All Reports</a>
                    </div>
                </div>
            </div>
            <div class="st_height_30 st_height_lg_30"></div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                        <div class="st_card_head">
                            <div class="st_card_head_left">
                                <h2 class="st_card_title">Line Chart</h2>
                            </div>
                            <div class="st_card_head_right">
                                <a href="#" class="st_card_head_btn">View All</a>
                            </div>
                        </div>
                        <div class="st_card_body">
                            <div class="st_height_25 st_height_lg_25"></div>
                            <div class="st_padd_lr_25">
                                <div class="st_card_nav st_style1">
                                    <a href="#" class="active">All</a>
                                    <a href="#">Zone A</a>
                                    <a href="#">Zone B</a>
                                    <a href="#">Zone C</a>
                                    <a href="#">Zone D</a>
                                    <a href="#">Zone E</a>
                                    <a href="#">Zone F</a>
                                    <a href="#">Zone G</a>
                                    <a href="#">Zone H</a>
                                    <a href="#">Zone I</a>
                                    <a href="#">Zone J</a>
                                </div>
                                <div class="st_height_25 st_height_lg_25"></div>
                                <div class="st_chart_box st_style1">
                                    <div class="st_chart_box_left">
                                        <div class="st_chart_title st_style1">Visits</div>
                                        <div class="st_height_10 st_height_lg_10"></div>
                                        <div class="st_chart_wrap st_style2">
                                            <div class="st_chart_wrap_left">
                                                <div class="st_chart_nav st_style1">
                                                    <a href="#">Hourly</a>
                                                    <a href="#">Daily</a>
                                                    <a href="#">Weekly</a>
                                                </div>
                                                <div style="height:145px;">
                                                    <canvas  id="st_chart5_4"></canvas>
                                                </div>
                                            </div>
                                            <div class="st_chart_wrap_right">
                                                <div class="st_chart_counter st_style1 st_green_box st_radius_5">
                                                    <h3 class="st_chart_counter_title">TOTAL VISITS</h3>
                                                    <div class="st_chart_counter_number">2100</div>
                                                </div>
                                                <div class="st_height_10 st_height_lg_10"></div>
                                                <div class="st_chart_counter st_style1 st_orange_box st_radius_5">
                                                    <h3 class="st_chart_counter_title">AVERAGE VISITS</h3>
                                                    <div class="st_chart_counter_number">2100</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .st_chart_box_left -->
                                    <div class="st_chart_box_right">
                                        <div class="st_chart_title st_style1">Rate of audience in Zone A</div>
                                        <div class="st_height_10 st_height_lg_10"></div>
                                        <div class="st_chart_wrap st_style1" style="height:175px;">
                                            <canvas  id="st_chart3_1"></canvas>
                                        </div>
                                    </div><!-- .st_chart_box_right -->
                                </div>
                                <div class="st_height_25 st_height_lg_25"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="st_iconbox st_style2">
                                            <div class="st_iconbox_icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80.13 80.13" xml:space="preserve">
                          <g>
                              <path d="M48.355,17.922c3.705,2.323,6.303,6.254,6.776,10.817c1.511,0.706,3.188,1.112,4.966,1.112
                              c6.491,0,11.752-5.261,11.752-11.751c0-6.491-5.261-11.752-11.752-11.752C53.668,6.35,48.453,11.517,48.355,17.922z M40.656,41.984
                              c6.491,0,11.752-5.262,11.752-11.752s-5.262-11.751-11.752-11.751c-6.49,0-11.754,5.262-11.754,11.752S34.166,41.984,40.656,41.984
                              z M45.641,42.785h-9.972c-8.297,0-15.047,6.751-15.047,15.048v12.195l0.031,0.191l0.84,0.263
                              c7.918,2.474,14.797,3.299,20.459,3.299c11.059,0,17.469-3.153,17.864-3.354l0.785-0.397h0.084V57.833
                              C60.688,49.536,53.938,42.785,45.641,42.785z M65.084,30.653h-9.895c-0.107,3.959-1.797,7.524-4.47,10.088
                              c7.375,2.193,12.771,9.032,12.771,17.11v3.758c9.77-0.358,15.4-3.127,15.771-3.313l0.785-0.398h0.084V45.699
                              C80.13,37.403,73.38,30.653,65.084,30.653z M20.035,29.853c2.299,0,4.438-0.671,6.25-1.814c0.576-3.757,2.59-7.04,5.467-9.276
                              c0.012-0.22,0.033-0.438,0.033-0.66c0-6.491-5.262-11.752-11.75-11.752c-6.492,0-11.752,5.261-11.752,11.752
                              C8.283,24.591,13.543,29.853,20.035,29.853z M30.589,40.741c-2.66-2.551-4.344-6.097-4.467-10.032
                              c-0.367-0.027-0.73-0.056-1.104-0.056h-9.971C6.75,30.653,0,37.403,0,45.699v12.197l0.031,0.188l0.84,0.265
                              c6.352,1.983,12.021,2.897,16.945,3.185v-3.683C17.818,49.773,23.212,42.936,30.589,40.741z"/>
                          </g>
                        </svg>
                                            </div>
                                            <div class="st_iconbox_meta">
                                                <div class="st_iconbox_title">Forecasted total audience</div>
                                                <div class="st_iconbox_number st_purple_color">2100</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="st_iconbox st_style2">
                                            <div class="st_iconbox_icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 445.44 445.44" xml:space="preserve">
                          <g>
                              <path d="M404.48,108.288H247.808l79.36-78.336l-14.336-14.336L230.4,96.512l-82.432-81.408L133.632,29.44l79.36,78.336H40.96
                              c-22.528,0-40.96,18.432-40.96,40.96v240.64c0,22.528,18.432,40.96,40.96,40.96h363.52c22.528,0,40.96-18.432,40.96-40.96v-240.64
                              C445.44,126.72,427.008,108.288,404.48,108.288z M276.48,336.64c0,16.896-13.824,30.72-30.72,30.72H87.04
                              c-16.896,0-30.72-13.824-30.72-30.72V203.52c0-16.896,13.824-30.72,30.72-30.72h158.72c16.896,0,30.72,13.824,30.72,30.72V336.64z
                               M353.28,355.072c-19.968,0-35.84-15.872-35.84-35.84c0-19.968,15.872-35.84,35.84-35.84s35.84,15.872,35.84,35.84
                              C389.12,339.2,373.248,355.072,353.28,355.072z M394.24,251.136h-81.92v-20.48h81.92V251.136z M394.24,199.936h-81.92v-20.48
                              h81.92V199.936z"/>
                          </g>
                        </svg>
                                            </div>
                                            <div class="st_iconbox_meta">
                                                <div class="st_iconbox_title">Active TV</div>
                                                <div class="st_iconbox_number st_green_color">14/15</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st_height_20 st_height_lg_20"></div>
                        </div>
                    </div>
                    <div class="st_height_30 st_height_lg_30"></div>
                    <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                        <div class="st_card_body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Campaigns</th>
                                    <th>Total payment (mins)</th>
                                    <th>Frequency</th>
                                    <th>Total visits</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="st_table_media st_style1">
                                            <a href="#" class="st_table_media_img st_box_md st_radius_5">
                                                <img src="assets/img/products/product3.png" alt="icon">
                                            </a>
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">ALL (15/20)</a></h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_text">90000</div>
                                    </td>
                                    <td>
                                        <span class="st_text_badge st_text_badge_success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="st_table_media st_style1">
                                            <a href="#" class="st_table_media_img st_box_md st_radius_5">
                                                <img src="assets/img/products/new-product.jpg" alt="icon">
                                            </a>
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">FRESH</a></h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_text">90000</div>
                                    </td>
                                    <td>
                                        <span class="st_text_badge st_text_badge_success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="st_table_media st_style1">
                                            <a href="#" class="st_table_media_img st_box_md st_radius_5">
                                                <img src="assets/img/products/product2.png" alt="icon">
                                            </a>
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">NABISCO</a></h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_text">90000</div>
                                    </td>
                                    <td>
                                        <span class="st_text_badge st_text_badge_success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="st_table_media st_style1">
                                            <a href="#" class="st_table_media_img st_box_md st_radius_5">
                                                <img src="assets/img/products/product1.png" alt="icon">
                                            </a>
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">COCACOLA</a></h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_text">90000</div>
                                    </td>
                                    <td>
                                        <span class="st_text_badge st_text_badge_success">Active</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="st_table_media st_style1">
                                            <a href="#" class="st_table_media_img st_box_md st_radius_5">
                                                <img src="assets/img/products/new-product.jpg" alt="icon">
                                            </a>
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">FRESH</a></h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_media st_style1 st_type1">
                                            <div class="st_table_media_info">
                                                <h2 class="st_media_title"><a href="#">110</a></h2>
                                                <div class="st_media_subtitle">OF 900</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="st_table_text">90000</div>
                                    </td>
                                    <td>
                                        <span class="st_text_badge st_text_badge_success">Active</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="st_height_15 st_height_lg_15"></div>
                            <nav aria-label="Page navigation" class="st_padd_lr_25">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <i class="material-icons">keyboard_arrow_left</i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-lg-4">
                    <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                        <div class="st_video_block st_style1">
                            <img src="assets/img/products/new-product.jpg" alt="">
                            <a href="https://www.youtube.com/embed/jRcfE2xxSAw?autoplay=1" class="st-play-btn st-style1 st-video-open">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 336 336" xml:space="preserve">
                  <g><path d="M286.8,49.2C256.4,18.8,214.4,0,168,0C121.6,0,79.6,18.8,49.2,49.2C18.8,79.6,0,121.6,0,168c0,46.4,18.8,88.4,49.2,118.8
                      C79.6,317.2,121.6,336,168,336c46.4,0,88.4-18.8,118.8-49.2C317.2,256.4,336,214.4,336,168C336,121.6,317.2,79.6,286.8,49.2z
                       M272.4,272.4c-26.8,26.8-63.6,43.2-104.4,43.2s-77.6-16.4-104.4-43.2C37.2,245.6,20.4,208.8,20.4,168S36.8,90.4,63.6,63.6
                      C90.4,36.8,127.2,20.4,168,20.4s77.6,16.4,104.4,43.2c26.8,26.8,43.2,63.6,43.2,104.4S298.8,245.6,272.4,272.4z"></path>
                  </g>
                                    <g><path d="M261.2,156c-0.8-0.8-2-2.4-3.2-4c-0.4-0.4-0.4-0.4-0.8-0.8c-1.2-1.2-2.4-2-4-2.8l-59.2-34c0,0-0.4,0-0.4-0.4L134,79.6
                      c-5.2-3.2-11.2-3.6-16.8-2.4c-5.6,1.6-10.4,5.2-13.6,10.4c-1.2,1.6-1.6,3.6-2.4,5.2c-0.4,1.2-0.4,2.8-0.8,4.4c0,0.4,0,1.2,0,1.6
                      V168v68.8c0,6,2.4,11.6,6.4,15.6s9.6,6.4,15.6,6.4c2,0,4.4-0.4,6.4-1.2s4-1.6,5.6-2.8l58.8-34l0.8-0.4l59.2-34
                      c0.4,0,0.4-0.4,0.8-0.4c4.8-3.2,8.4-8,9.6-13.2C265.2,167.2,264.4,161.2,261.2,156z M244,168.4c0,0.4-0.4,0.8-0.8,0.8h-0.4
                      L184,203.6l-0.4,0.4l-58.8,34c-0.4,0-0.4,0.4-0.8,0.4c0,0-0.4,0-0.4,0.4h-0.4c-0.4,0-0.8-0.4-1.2-0.4c-0.4-0.4-0.4-0.8-0.4-1.2
                      V168V99.2v-0.4v-0.4c0.4-0.4,0.8-0.8,1.2-0.8c0.4,0,0.8,0,1.2,0l59.2,34l0.4,0.4l59.6,34.4l0.4,0.4l0.4,0.4
                      C244,167.6,244,168,244,168.4z"></path>
                                    </g>
                </svg>
                                <span class="st-video-animaiton"><span></span></span>
                            </a>
                        </div>
                    </div>
                    <div class="st_height_30 st_height_lg_30"></div>
                    <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                        <div class="st_card_head">
                            <div class="st_card_head_left">
                                <h2 class="st_card_title">Zone performance</h2>
                            </div>
                        </div>
                        <div class="st_card_body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Zones</th>
                                    <th>Visits</th>
                                    <th>Progress</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Zone A</td>
                                    <td>500</td>
                                    <td>
                                        <div class="st_table_progress st_style1">
                                            <div class="progress st_blue_bg " style="width: 50%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Zone B</td>
                                    <td>500</td>
                                    <td>
                                        <div class="st_table_progress st_style1">
                                            <div class="progress st_green_bg " style="width: 80%"></div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="st_height_30 st_height_lg_30"></div>
                    <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                        <div class="st_card_head">
                            <div class="st_card_head_left">
                                <h2 class="st_card_title">Location performance</h2>
                            </div>
                        </div>
                        <div class="st_card_body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Visits</th>
                                    <th>Progress</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>KALABA</td>
                                    <td>879</td>
                                    <td>
                                        <div class="st_table_progress st_style1">
                                            <div class="progress st_orange_bg " style="width: 50%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>DHANM</td>
                                    <td>852</td>
                                    <td>
                                        <div class="st_table_progress st_style1">
                                            <div class="progress st_purple_bg " style="width: 80%"></div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="st_height_30 st_height_lg_30"></div>
                    <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                        <div class="st_card_head">
                            <div class="st_card_head_left">
                                <h2 class="st_card_title">Shop Performance</h2>
                            </div>
                        </div>
                        <div class="st_card_body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Location</th>
                                    <th>Visits</th>
                                    <th>Progress</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>SHOP 1</td>
                                    <td>568</td>
                                    <td>
                                        <div class="st_table_progress st_style1">
                                            <div class="progress st_teal_bg " style="width: 50%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>SHOP 2</td>
                                    <td>256</td>
                                    <td>
                                        <div class="st_table_progress st_style1">
                                            <div class="progress st_pink_bg " style="width: 80%"></div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="st_height_50 st_height_lg_50"></div>

    <!-- Start Video Popup -->
    <div class="st-video-popup">
        <div class="st-video-popup-overlay"></div>
        <div class="st-video-popup-content">
            <div class="st-video-popup-layer"></div>
            <div class="st-video-popup-container">
                <div class="st-video-popup-align">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="about:blank"></iframe>
                    </div>
                </div>
                <div class="st-video-popup-close"></div>
            </div>
        </div>
    </div>
    <!-- End Video Popup -->
@endsection
