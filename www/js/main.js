/**
 * Created by nette on 23.06.15.
 */
/*global $*/
$(document).ready( function() {
    var str = '',
        form = $('#contactForm'),
        formMessages = $('#formMessages');

    $('#my-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    jQuery.getJSON('./json/skills.json', function(json){
        console.log(json.skills);

        var i = 0;
        var colors = ["#85B3B7", "#BDA259", "#474C83", "#979BC6", "#376E73"];

        jQuery.each(json.skills, function (key, val) {
            if (i !== 0 && i != 8) {
                str += '<div class="col-sm-4" style="color: ' + colors[i % 5] + ';">';
            } else {
                str += '<div class="col-md-12" style="color: ' + colors[i % 6] + ';">';
            }
            str += '<h3>' + val.category + '</h3>';
            jQuery.each(json.skills[key].list, function(key, val) {
                if (val.level)
                    if (val.level > 0) {
                        str += '<span class="skill skill-level-' + val.level + '" ATOMICSELECTION>' + val.name + '</span> ';
                    }
            });
            str += '</div>';
            i++;
        });

        $('#skills-list').html(str);
    });

    jQuery.getJSON('./json/qualifications.json', function(json){
        var str2 = "", str3 = "";

        jQuery.each(json.articles, function (key, val) {
            str2 += '<li><a href="' + val.Link + '" class="article-link" >' + val.Name + '</a></li>';
        });

        $('#list-of-articles').html(str2);

        jQuery.each(json.courses, function (key, val) {
            str3 += '<div class="course-info col-md-4"><p><a href="' + val.Link + '" class="course-name" >' + val.Name + '</a></p>' +
                '<p>' + val.DateFrom + ' - ' + val.DateTo + '</p>' +
            '<p>Status: ' + val.Status + '</p>';
            if (val.Certificate)
                str3 += '<p><a href="' + val.Certificate + '" target="_blank">Certificate</a></p></div>';
        });

        $('#my-courses').html(str3);
    });

    $(form).submit(function(e) {
        e.preventDefault();

        var formData = $(form).serialize();

        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })
            .done(function(response) {
                $(formMessages).removeClass('alert alert-danger');
                $(formMessages).addClass('alert alert-success');

                $(formMessages).text(response);

                $('#name').val('');
                $('#email').val('');
                $('#message').val('');
            })
            .fail(function(data) {
                $(formMessages).removeClass('alert alert-success');
                $(formMessages).addClass('alert alert-danger');

                if (data.responseText !== '') {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text('Oops! An error occured and your message could not be sent.');
                }
            });
    });

});