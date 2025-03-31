program LosoweLiczby;
uses crt;

const 
    N = 50; 
type
    ArrayType = array[1..N] of integer;
var
    liczby: ArrayType;

procedure PrintArray(var arr: ArrayType);
var
    i: integer;
begin
    for i := 1 to N do
        write(arr[i], ' ');
    writeln;
end;

procedure GenerateNumbers(var arr: ArrayType);
var
    i: integer;
begin
    Randomize;
    for i := 1 to N do
    begin
        arr[i] := Random(101);
    end;
end;

procedure BubbleSort(var arr: ArrayType);
var
    i, j, temp: integer;
begin
    for i := 1 to N-1 do
        for j := 1 to N-i do
            if arr[j] > arr[j+1] then
            begin
                temp := arr[j];
                arr[j] := arr[j+1];
                arr[j+1] := temp;
            end;
end;

begin
    writeln('random numbers: ');
    GenerateNumbers(liczby);
    PrintArray(liczby);
    writeln('sorted numbers: ');
    BubbleSort(liczby);
    PrintArray(liczby);
    writeln;
end.