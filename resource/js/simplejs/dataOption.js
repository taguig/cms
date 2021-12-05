var record = function (Value,groupe) {
    this.value = Value;
    this.initValue = Value;
    this.groupe=groupe;
    var NameEvent = ["change"];
    var Event = {};
    var Scope = {};
    this.on = function (event, fun, scope) {
        if (NameEvent.includes(event)) {
            if (scope != null && scope != undefined) {
                Scope[event] = scope;
                Event[event] = fun;
            } else {
                Event[event] = fun;
            }
        } else {
            throw new Error("event " + event + " n'existe pas");
        }
    }
    var emit = function (event) {
        var param = arguments;
        param.shift();
        if (NameEvent.includes(event)) {
            if (Event.hasOwnProperty(event)) {
                if (Scope.hasOwnProperty(event)) {
                    return Event.apply(Scope[event], param);
                }
                return Event.apply(null, param);
            }
        } else return null;
    }
    this.setValue = function (v) {
        var value = emit(change, v);
        if (value == null) {
            this.value = v;
        } else {
            this.value=value;
        }
    }
    this.ifChange=function(){
        return (this.value != this.initValue);
    }
}