@extends('ddad.layout')
@section('content')
    <div class="st_height_20 st_height_lg_20"></div>
    <div class="st_page_header st_style1">
        <div class="st_page_header_left">
            <h1 class="st_page_header_title">Today's overview</h1>
            <p class="st_page_header_subtitle">Welcome to Dashboard Template.</p>
        </div>
        <div class="st_page_header_right">
            <div class="st_page_header_btn_group">
                <!-- <a href="#" class="btn btn-outline-light st_icon_btn"><i class="material-icons">refresh</i></a> -->
                <a href="#" class="btn btn-outline-light"><i class="material-icons-outlined">calendar_today</i>Today</a>
                <a href="#" class="btn btn-primary"><i class="material-icons-outlined">description</i>This week</a>
                <a href="#" class="btn btn-primary"><i class="material-icons-outlined">description</i>This month</a>
            </div>
        </div>
    </div>
    <div class="st_height_15 st_height_lg_15"></div>
    <div class="row">
        <div class="col-lg-3">
            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_iconbox_title">Total Purchase</div>
                <div class="st_iconbox_number">12,354</div>
                <div class="st_iconbox_footer">
                    <span class="st_text_badge st_text_badge_success"><i class="material-icons">arrow_drop_up</i>1.56%</span>since last week
                </div>
                <div class="st_iconbox_icon st_indigo_box st_box_md st_radius_4"><i class="material-icons-outlined">supervisor_account</i></div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_iconbox_title">Total Sale</div>
                <div class="st_iconbox_number">502</div>
                <div class="st_iconbox_footer">
                    <span class="st_text_badge st_text_badge_danger"><i class="material-icons">arrow_drop_down</i>0.59%</span>since last week
                </div>
                <div class="st_iconbox_icon st_blue_box st_box_md st_radius_4"><i class="material-icons-outlined">store</i></div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_iconbox_title">Due Paid</div>
                <div class="st_iconbox_number">$15M</div>
                <div class="st_iconbox_footer">
                    <span class="st_text_badge st_text_badge_success"><i class="material-icons">arrow_drop_up</i>1.25%</span>since last week
                </div>
                <div class="st_iconbox_icon st_purple_box st_box_md st_radius_4"><i class="material-icons-outlined">cloud_queue</i></div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_iconbox_title">Due received</div>
                <div class="st_iconbox_number">510k</div>
                <div class="st_iconbox_footer">
                    <span class="st_text_badge st_text_badge_success"><i class="material-icons">arrow_drop_up</i>6.12%</span>since last week
                </div>
                <div class="st_iconbox_icon st_teal_box st_box_md st_radius_4"><i class="material-icons-outlined">add_to_photos</i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_iconbox_title">Total expense</div>
                <div class="st_iconbox_number">12,354</div>
                <div class="st_iconbox_footer">
                    <span class="st_text_badge st_text_badge_success"><i class="material-icons">arrow_drop_up</i>1.56%</span>since last week
                </div>
                <div class="st_iconbox_icon st_indigo_box st_box_md st_radius_4"><i class="material-icons-outlined">supervisor_account</i></div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_iconbox_title">Total damage</div>
                <div class="st_iconbox_number">502</div>
                <div class="st_iconbox_footer">
                    <span class="st_text_badge st_text_badge_danger"><i class="material-icons">arrow_drop_down</i>0.59%</span>since last week
                </div>
                <div class="st_iconbox_icon st_blue_box st_box_md st_radius_4"><i class="material-icons-outlined">store</i></div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_iconbox_title">Purchase return</div>
                <div class="st_iconbox_number">$15M</div>
                <div class="st_iconbox_footer">
                    <span class="st_text_badge st_text_badge_success"><i class="material-icons">arrow_drop_up</i>1.25%</span>since last week
                </div>
                <div class="st_iconbox_icon st_purple_box st_box_md st_radius_4"><i class="material-icons-outlined">cloud_queue</i></div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_iconbox_title">Sale return</div>
                <div class="st_iconbox_number">510k</div>
                <div class="st_iconbox_footer">
                    <span class="st_text_badge st_text_badge_success"><i class="material-icons">arrow_drop_up</i>6.12%</span>since last week
                </div>
                <div class="st_iconbox_icon st_teal_box st_box_md st_radius_4"><i class="material-icons-outlined">add_to_photos</i></div>
            </div>
        </div>
    </div>

@endsection
