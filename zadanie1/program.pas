program LosoweLiczby;
uses crt;

const 
    MAX_N = 500;
type
    ArrayType = array[1..MAX_N] of integer;
var
    liczby: ArrayType;
    n, min, max: integer;

procedure PrintArray(var arr: ArrayType; ile: integer);
var
    i: integer;
begin
    for i := 1 to ile do
        write(arr[i], ' ');
    writeln;
end;

procedure GenerateNumbers(var arr: ArrayType; ile, od, do_: integer);
var
    i: integer;
begin
    Randomize;
    for i := 1 to ile do
    begin
        arr[i] := Random(do_ - od + 1) + od;
    end;
end;

procedure BubbleSort(var arr: ArrayType; ile: integer);
var
    i, j, temp: integer;
begin
    for i := 1 to ile-1 do
        for j := 1 to ile-i do
            if arr[j] > arr[j+1] then
            begin
                temp := arr[j];
                arr[j] := arr[j+1];
                arr[j+1] := temp;
            end;
end;

begin
    write('Give min and max value: ');
    readln(min, max);
    write('How many numbers to generate?: ');
    readln(n);

    if(n > MAX_N) or (n <= 0) or (min > max) then
    begin
        writeln('Invalid input. Please check the values.');
        exit;
    end;

    writeln('random numbers: ');
    GenerateNumbers(liczby, n, min, max);
    PrintArray(liczby, n);
    writeln('sorted numbers: ');
    BubbleSort(liczby, n);
    PrintArray(liczby, n);
    writeln;
end.