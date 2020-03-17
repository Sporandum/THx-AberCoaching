/*!
 * 
 * THx-AberCoaching
 * 
 * @author Sporandum
 * @version 0.1.0
 * @link UNLICENSED
 * @license UNLICENSED
 * 
 * Copyright (c) 2020 Sporandum
 * 
 * This software is released under the UNLICENSED License
 * https://opensource.org/licenses/UNLICENSED
 * 
 * Compiled with the help of https://wpack.io
 * A zero setup Webpack Bundler Script for WordPress
 */
(window.wpackiowpackjsJsonp=window.wpackiowpackjsJsonp||[]).push([[1],{10:function(t,e,n){"use strict";n.r(e);var i=n(0),s=n(1),c=function(){function t(){Object(i.a)(this,t),this.menuIcon=document.getElementById("site-header__menu-icon"),this.burgerIcon=document.getElementById("burger-icon"),this.menuContent=document.getElementById("site-header__menu-content"),this.events()}return Object(s.a)(t,[{key:"events",value:function(){var t=this;this.menuIcon.addEventListener("click",(function(){return t.toggleMenu()}))}},{key:"toggleMenu",value:function(){this.menuContent.classList.toggle("site-header__menu-content--is-visible"),this.burgerIcon.classList.toggle("burger-icon--close-x")}}]),t}(),o=n(4),u=function(){function t(e){Object(i.a)(this,t),this.sectionID=e,this.sectionEl=this.getSectionEl(),this.matchingLink=this.getMatchingLink(),this.menuHeight=96,this.elState=!1,this.events()}return Object(s.a)(t,[{key:"events",value:function(){var t=this;this.sectionEl&&this.matchingLink&&document.addEventListener("scroll",Object(o.throttle)((function(){return t.runOnScroll()}),200))}},{key:"getSectionEl",value:function(){if(document.getElementById(this.sectionID))return document.getElementById(this.sectionID)}},{key:"getMatchingLink",value:function(){if(this.sectionEl&&document.querySelector(this.sectionEl.getAttribute("data-matching-link")))return document.querySelector(this.sectionEl.getAttribute("data-matching-link"))}},{key:"runOnScroll",value:function(){var t=this.sectionEl.getBoundingClientRect().y,e=-1*(this.sectionEl.getBoundingClientRect().height-this.menuHeight);t<this.menuHeight&&t>e&&!this.elState&&(this.matchingLink.classList.add("current-menu-item"),this.elState=!0),(t>this.menuHeight||t<e)&&this.elState&&(this.matchingLink.classList.remove("current-menu-item"),this.elState=!1)}}]),t}(),h=n(5);new c,new u("presentation"),new u("services"),new u("last-posts"),new u("contact"),document.getElementById("testimonials")&&new h.a(".glide",{gap:200}).mount()},6:function(t,e,n){n(7),t.exports=n(10)}},[[6,0,2]]]);
//# sourceMappingURL=scripts-920861ea.js.map