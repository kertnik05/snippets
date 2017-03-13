System.register(['angular2/core'], function(exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1;
    var Slide0;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            }],
        execute: function() {
            Slide0 = (function () {
                function Slide0(elRef) {
                    this.elRef = elRef;
                    this.slideNumber = 0;
                }
                Slide0.prototype.ngOnInit = function () {
                    sessionStorage.warningMessage = 'this warning for slide 1';
                    $.getScript("./app/js/scorm12nav.js");
                };
                Slide0 = __decorate([
                    core_1.Component({
                        selector: 'slide0',
                        templateUrl: "./app/common/slides/slide0.component.html",
                        styleUrls: ['./app/css/style.css']
                    }), 
                    __metadata('design:paramtypes', [core_1.ElementRef])
                ], Slide0);
                return Slide0;
            }());
            exports_1("Slide0", Slide0);
        }
    }
});
//# sourceMappingURL=slide0.component.js.map