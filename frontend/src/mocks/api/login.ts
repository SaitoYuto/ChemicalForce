import { LoginResponse } from "@/interfaces/Responses/Login";
import Chance from "chance";

const chance = new Chance();

export const loginResponse = {
  id: "R" + chance.natural({ min: 10000, max: 9999999 }),
  name: chance.name(),
  token: chance.hash(),
  supervisor_id: "R" + chance.natural({ min: 10000, max: 9999999 }),
} as LoginResponse;
