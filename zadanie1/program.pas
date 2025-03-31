program LosoweLiczby;
uses crt, sysutils;

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

procedure TestGenerateNumbers;
var
    arr: ArrayType;
    i, n, min, max: integer;
    valid: boolean;
begin
    n := 10;
    min := 1;
    max := 100;
    valid := True;
    GenerateNumbers(arr, n, min, max);
    for i := 1 to n do
        begin
            if (arr[i] < min) or (arr[i] > max) then
                begin
                    valid := false;
                    break;
                end;
        end;
    if valid then
        writeln('✅ TestGenerateNumbers passed')
    else
        writeln('❌ TestGenerateNumbers failed');
end;

procedure TestBubbleSort;
var
    arr: ArrayType;
    i, n: integer;
    sorted: boolean;
begin
    n := 10;
    GenerateNumbers(arr, n, 1, 100);
    BubbleSort(arr, n);
    sorted := True;
    for i := 1 to n-1 do
        if arr[i] > arr[i+1] then
            begin
                sorted := false;
                break;
            end;
    if sorted then
        writeln('✅ TestBubbleSort passed')
    else
        writeln('❌ TestBubbleSort failed');
end;

procedure TestSortedArray;
var
    arr: ArrayType;
    i, n: integer;
    sorted: boolean;
begin
    n := 5;
    arr[1] := 1;
    arr[2] := 2;
    arr[3] := 3;
    arr[4] := 4;
    arr[5] := 5;

    BubbleSort(arr, n);

    sorted := True;
    for i := 1 to n-1 do
        if arr[i] > arr[i+1] then
            sorted := False;

    if sorted then
        writeln('✅ TestSortedArray passed')
    else
        writeln('❌ TestSortedArray failed');
end;

procedure TestFullRangeGeneration;
var
    arr: ArrayType;
    i, n, min, max: integer;
    valid: boolean;
begin
    n := 50;
    min := 0;
    max := 100;
    valid := True;
    GenerateNumbers(arr, n, min, max);
    
    for i := 1 to n do
        if (arr[i] < min) or (arr[i] > max) then
        begin
            valid := false;
            break;
        end;
    
    if valid then
        writeln('✅ TestFullRangeGeneration passed')
    else
        writeln('❌ TestFullRangeGeneration failed');
end;

procedure TestEmptyArraySort;
var
    arr: ArrayType;
begin
    BubbleSort(arr, 0);
    writeln('✅ TestEmptyArraySort passed');
end;

begin
    TestGenerateNumbers;
    TestBubbleSort;
    TestSortedArray;
    TestFullRangeGeneration;
    TestEmptyArraySort;
end.