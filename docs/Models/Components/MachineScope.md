# MachineScope

Machine scope created successfully for a machine


## Fields

| Field                                                                          | Type                                                                           | Required                                                                       | Description                                                                    |
| ------------------------------------------------------------------------------ | ------------------------------------------------------------------------------ | ------------------------------------------------------------------------------ | ------------------------------------------------------------------------------ |
| `object`                                                                       | [Components\MachineScopeObject](../../Models/Components/MachineScopeObject.md) | :heavy_check_mark:                                                             | N/A                                                                            |
| `fromMachineId`                                                                | *string*                                                                       | :heavy_check_mark:                                                             | The ID of the machine that has access to the target machine.                   |
| `toMachineId`                                                                  | *string*                                                                       | :heavy_check_mark:                                                             | The ID of the machine that is being accessed.                                  |
| `createdAt`                                                                    | *int*                                                                          | :heavy_check_mark:                                                             | Unix timestamp of creation.                                                    |