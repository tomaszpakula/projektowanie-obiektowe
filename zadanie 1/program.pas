program LosoweLiczby;
uses crt;

const 
    N = 50; 
type
    ArrayType = array[1..N] of integer;
var
    liczby: ArrayType;

procedure GenerateNumbers(var arr: ArrayType);
var
    i: integer;
begin
    Randomize;
    for i := 1 to N do
    begin
        arr[i] := Random(101);
        write(arr[i], ' ');
    end;
end;

begin
    GenerateNumbers(liczby);
    writeln;
end.